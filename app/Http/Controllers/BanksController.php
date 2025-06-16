<?php

namespace App\Http\Controllers;

use App\DataTables\BanksDataTable;
use App\Helpers\Account;
use App\Http\Requests\CreateBanksRequest;
use App\Http\Requests\UpdateBanksRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Accounts;
use App\Models\Banks;
use App\Repositories\BanksRepository;
use Illuminate\Http\Request;
use App\DataTables\LedgerDataTable;
use App\DataTables\FilesDataTable;
use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\DB;
use App\Models\Transactions;





use Flash;

class BanksController extends AppBaseController
{
  /** @var BanksRepository $banksRepository*/
  private $banksRepository;

  public function __construct(BanksRepository $banksRepo)
  {
    $this->banksRepository = $banksRepo;
  }

  /**
   * Display a listing of the Banks.
   */
  public function index(BanksDataTable $banksDataTable)
  {

    if (!auth()->user()->hasPermissionTo('bank_view')) {
      abort(403, 'Unauthorized action.');
    }
    return $banksDataTable->render('banks.index');
  }


  /**
   * Show the form for creating a new Banks.
   */
  public function create()
  {
    return view('banks.create');
  }

  /**
   * Store a newly created Banks in storage.
   */
  public function store(CreateBanksRequest $request)
  {
    $input = $request->all();

    $banks = $this->banksRepository->create($input);

    //Adding Account and setting reference

    $parentAccount = Accounts::firstOrCreate(
      ['name' => 'Bank', 'account_type' => 'Asset', 'parent_id' => null],
      ['name' => 'Bank', 'account_type' => 'Asset', 'account_code' => Account::code()]
    );

    $account = new Accounts();
    $account->account_code = 'BK' . str_pad($banks->id, 4, "0", STR_PAD_LEFT);
    $account->account_type = 'Asset';
    $account->name = $banks->name;
    $account->parent_id = $parentAccount->id;
    $account->ref_name = 'Bank';
    $account->ref_id = $banks->id;
    $account->status = $banks->status;
    $account->save();

    $banks->account_id = $account->id;
    $banks->save();

    return response()->json(['message' => 'Bank added successfully.']);
  }

  /**
   * Display the specified Banks.
   */
  public function show($id)
  {
    $banks = $this->banksRepository->find($id);

    if (empty($banks)) {
      Flash::error('Banks not found');

      return redirect(route('banks.index'));
    }

    return view('banks.show')->with('banks', $banks);
  }

  /**
   * Show the form for editing the specified Banks.
   */
  public function edit($id)
  {
    $banks = $this->banksRepository->find($id);

    if (empty($banks)) {
      Flash::error('Banks not found');

      return redirect(route('banks.index'));
    }

    return view('banks.edit')->with('banks', $banks);
  }

public function ledger($id, LedgerDataTable $ledgerDataTable)
  {
    

    $banks = $this->banksRepository->find($id);
    if (empty($banks)) {
      Flash::error('Banks not found');
      return redirect(route('banks.index'));
    }

    if (!$banks->account_id) {
      Flash::error('Banks has no associated account_id.');
      return redirect(route('banks.index'));
    }

    $files = Transactions::where('account_id', $banks->account_id)->get();
    $account_id = $banks->account_id;

    return $ledgerDataTable->with(['account_id' => $account_id])
      ->render('banks.ledger', [
        'banks' => $banks,
        'files' => $files,
        'dataTable' => $ledgerDataTable
      ]);
  }



public function files($id, FilesDataTable $filesDataTable)
{
    $banks = banks::find($id); // Fetch bank
    if (!$banks) {
        abort(404, 'Bank not found');
    }

    return $filesDataTable
        ->with([
            'type' => 4,
            'type_id' => $id,   // ✅ pass 'type_id'
        ])
        ->render('banks.document', compact('banks'));
}


  /**
   * Update the specified Banks in storage.
   */
  public function update($id, UpdateBanksRequest $request)
  {
    $banks = $this->banksRepository->find($id);

    if (empty($banks)) {

      return response()->json(['errors' => ['error' => 'Bank not found!']], 422);
    }

    $banks = $this->banksRepository->update($request->all(), $id);
    $banks->account->status = $banks->status;
    $banks->save();

    return response()->json(['message' => 'Bank updated successfully.']);
  }

  /**
   * Remove the specified Banks from storage.
   *
   * @throws \Exception
   */
  public function destroy($id)
  {
    $banks = $this->banksRepository->find($id);

    if (empty($banks)) {
      return response()->json(['errors' => ['error' => 'Bank not found!']], 422);
    }


    if ($banks->transactions->count() > 0) {
      return response()->json(['errors' => ['error' => 'Bank have transactions!']], 422);

    } else {

      if ($banks->account) {
        $banks->account->delete();
      }
      $this->banksRepository->delete($id);

    }


    return response()->json(['message' => 'Bank deleted successfully.']);

  }
  
  public function document($bank_id)
{
    if (request()->isMethod('post')) {

        foreach (request('documents') as $document) {
            if ($document['expiry_date']) {
                $data = [];

                if (isset($document['file_name'])) {
                    $extension = $document['file_name']->extension();
                    $name = $document['type'] . '-' . $bank_id . '-' . time() . '.' . $extension;
                    $document['file_name']->storeAs('bank', $name);

                    $data['file_name'] = $name;
                    $data['file_type'] = $extension;
                }

                $data['type_id'] = $bank_id;
                $data['type'] = 'Bank';
                $data['expiry_date'] = $document['expiry_date'];

                $condition = [
                    'type' => 'Bank',
                    'type_id' => $bank_id,
                    'type' => $document['type'],
                ];

                Files::updateOrCreate($condition, $data);
            } else {
                if (isset($document['file_name'])) {
                    return response()->json([
                        'errors' => [
                            'error' => General::file_types($document['type']) . ' expiry date must be selected.'
                        ]
                    ], 422);
                }
            }
        }

        return 1;
    }

    $files = Files::where(['type' => 'Bank', 'type_id' => $bank_id])->get();
    $bank = Bank::find($bank_id);

    return view('banks.document', compact('files', 'bank'));
}

}
