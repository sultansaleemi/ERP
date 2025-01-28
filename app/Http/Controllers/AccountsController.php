<?php

namespace App\Http\Controllers;

use App\DataTables\AccountsDataTable;
use App\Http\Requests\CreateAccountsRequest;
use App\Http\Requests\UpdateAccountsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Accounts;
use App\Models\Transactions;
use App\Repositories\AccountsRepository;
use Illuminate\Http\Request;
use Flash;

class AccountsController extends AppBaseController
{
  /** @var AccountsRepository $accountsRepository*/
  private $accountsRepository;

  public function __construct(AccountsRepository $accountsRepo)
  {
    $this->accountsRepository = $accountsRepo;
  }

  /**
   * Display a listing of the Accounts.
   */
  public function index(AccountsDataTable $accountsDataTable)
  {
    return $accountsDataTable->render('accounts.index');
  }


  /**
   * Show the form for creating a new Accounts.
   */
  public function create()
  {
    //$parents = Accounts::whereNull('parent_account_id')->pluck('account_name', 'id')->prepend('Select', null);
    //$parents = Accounts::with('children')->whereNull('parent_account_id')->get();
    $parents = Accounts::all(['id', 'name', 'parent_id'])->groupBy('parent_id');

    return view('accounts.create', compact('parents'));
  }

  /**
   * Store a newly created Accounts in storage.
   */
  public function store(CreateAccountsRequest $request)
  {
    $input = $request->all();

    $accounts = $this->accountsRepository->create($input);

    return response()->json(['message' => 'Account added successfully.']);

  }

  /**
   * Display the specified Accounts.
   */
  public function show($id)
  {
    $accounts = $this->accountsRepository->find($id);

    if (empty($accounts)) {
      Flash::error('Accounts not found');

      return redirect(route('accounts.index'));
    }

    return view('accounts.show')->with('accounts', $accounts);
  }

  /**
   * Show the form for editing the specified Accounts.
   */
  public function edit($id)
  {
    $accounts = $this->accountsRepository->find($id);

    if (empty($accounts)) {
      Flash::error('Accounts not found');

      return redirect(route('accounts.index'));
    }
    //$parents = Accounts::whereNot('id', $id)->whereNull('parent_account_id')->pluck('account_name', 'id')->prepend('Select', null);
    $parents = Accounts::all(['id', 'name', 'parent_id'])->groupBy('parent_id');
    return view('accounts.edit', compact('accounts', 'parents'));
  }

  /**
   * Update the specified Accounts in storage.
   */
  public function update($id, UpdateAccountsRequest $request)
  {
    $accounts = $this->accountsRepository->find($id);

    if (empty($accounts)) {
      Flash::error('Accounts not found');

      return redirect(route('accounts.index'));
    }

    $accounts = $this->accountsRepository->update($request->all(), $id);

    return response()->json(['message' => 'Account updated successfully.']);

  }

  /**
   * Remove the specified Accounts from storage.
   *
   * @throws \Exception
   */
  public function destroy($id)
  {
    $accounts = $this->accountsRepository->find($id);
    $isParent = Accounts::where('parent_id', $accounts->id)->count();
    $Transactions = Transactions::where('account_id', $accounts->id)->count();

    if ($isParent > 0) {
      return response()->json(['errors' => ['error' => 'This account have child accounts.']], 422);
    }
    if ($Transactions > 0) {
      return response()->json(['errors' => ['error' => 'This account have transactions.']], 422);
    }

    if (empty($accounts)) {
      Flash::error('Accounts not found');

      return redirect(route('accounts.index'));
    }

    $this->accountsRepository->delete($id);

    return response()->json(['message' => 'Account deleted successfully.']);

  }
}
