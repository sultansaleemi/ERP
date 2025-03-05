<?php

namespace App\Http\Controllers;

use App\DataTables\RiderInvoicesDataTable;
use App\Http\Requests\CreateRiderInvoicesRequest;
use App\Http\Requests\UpdateRiderInvoicesRequest;
use App\Http\Controllers\AppBaseController;
use App\Imports\ImportRiderInvoice;
use App\Repositories\RiderInvoicesRepository;
use Illuminate\Http\Request;
use Flash;
use Maatwebsite\Excel\Facades\Excel;

class RiderInvoicesController extends AppBaseController
{
  /** @var RiderInvoicesRepository $riderInvoicesRepository*/
  private $riderInvoicesRepository;

  public function __construct(RiderInvoicesRepository $riderInvoicesRepo)
  {
    $this->riderInvoicesRepository = $riderInvoicesRepo;
  }

  /**
   * Display a listing of the RiderInvoices.
   */
  public function index(RiderInvoicesDataTable $riderInvoicesDataTable)
  {
    return $riderInvoicesDataTable->render('rider_invoices.index');
  }


  /**
   * Show the form for creating a new RiderInvoices.
   */
  public function create()
  {
    return view('rider_invoices.create');
  }

  /**
   * Store a newly created RiderInvoices in storage.
   */
  public function store(CreateRiderInvoicesRequest $request)
  {
    $input = $request->all();

    $riderInvoices = $this->riderInvoicesRepository->create($input);

    Flash::success('Rider Invoices saved successfully.');

    return redirect(route('riderInvoices.index'));
  }

  /**
   * Display the specified RiderInvoices.
   */
  public function show($id)
  {
    $riderInvoices = $this->riderInvoicesRepository->find($id);

    if (empty($riderInvoices)) {
      Flash::error('Rider Invoices not found');

      return redirect(route('riderInvoices.index'));
    }

    return view('rider_invoices.show')->with('riderInvoices', $riderInvoices);
  }

  /**
   * Show the form for editing the specified RiderInvoices.
   */
  public function edit($id)
  {
    $riderInvoices = $this->riderInvoicesRepository->find($id);

    if (empty($riderInvoices)) {
      Flash::error('Rider Invoices not found');

      return redirect(route('riderInvoices.index'));
    }

    return view('rider_invoices.edit')->with('riderInvoices', $riderInvoices);
  }

  /**
   * Update the specified RiderInvoices in storage.
   */
  public function update($id, UpdateRiderInvoicesRequest $request)
  {
    $riderInvoices = $this->riderInvoicesRepository->find($id);

    if (empty($riderInvoices)) {
      Flash::error('Rider Invoices not found');

      return redirect(route('riderInvoices.index'));
    }

    $riderInvoices = $this->riderInvoicesRepository->update($request->all(), $id);

    Flash::success('Rider Invoices updated successfully.');

    return redirect(route('riderInvoices.index'));
  }

  /**
   * Remove the specified RiderInvoices from storage.
   *
   * @throws \Exception
   */
  public function destroy($id)
  {
    $riderInvoices = $this->riderInvoicesRepository->find($id);

    if (empty($riderInvoices)) {
      Flash::error('Rider Invoices not found');

      return redirect(route('riderInvoices.index'));
    }

    $this->riderInvoicesRepository->delete($id);

    Flash::success('Rider Invoices deleted successfully.');

    return redirect(route('riderInvoices.index'));
  }

  public function import(Request $request)
  {
    if ($request->isMethod('post')) {
      $rules = [
        'file' => 'required|max:50000|mimes:xlsx'
      ];
      $message = [
        'file.required' => 'Excel File Required'
      ];
      $this->validate($request, $rules, $message);
      Excel::import(new ImportRiderInvoice(), $request->file('file'));
    }

    return view('rider_invoices.import');
  }
}
