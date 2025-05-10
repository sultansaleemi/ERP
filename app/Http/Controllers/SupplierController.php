<?php

namespace App\Http\Controllers;

use App\DataTables\SuppliersDataTable;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Repositories\SuppliersRepository;
use App\Http\Controllers\AppBaseController;
use App\Helpers\Account;
use App\DataTables\LedgerDataTable;
use App\Models\Transactions;
use App\Models\Files;
use Flash;




class SupplierController extends AppBaseController
{
    public function index(SuppliersDataTable $dataTable)
    {
        return $dataTable->render('suppliers.index');
    }

    public function create()
    {
        return view('suppliers.create');
    }

    private $suppliersRepository;

    public function __construct(SuppliersRepository $suppliersRepo)
    {
        $this->suppliersRepository = $suppliersRepo;
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:suppliers,name',
        'email' => 'nullable|email',
        'phone' => 'nullable|string',
        'company_name' => 'nullable|string',
        'address' => 'nullable|string',
    ]);

    $supplier = Supplier::create($validated);

    // Create or get parent "Supplier" account
    $parentAccount = Accounts::firstOrCreate(
        ['name' => 'Supplier', 'account_type' => 'Liability', 'parent_id' => null],
        ['name' => 'Supplier', 'account_type' => 'Liability','account_code' => Account::code()]
    );

    // Create linked account in chart of accounts
    $account = new Accounts();
    $account->account_code = 'SUP' . str_pad($supplier->id, 4, "0", STR_PAD_LEFT);
    $account->account_type = 'Liability';
    $account->name = $supplier->name;
    $account->parent_id = $parentAccount->id;
    $account->ref_name = 'Supplier';
    $account->ref_id = $supplier->id;
    $account->status = 1;
    $account->save();

    $supplier->account_id = $account->id;
    $supplier->save();

    return response()->json(['message' => 'Supplier created successfully.']);
}


public function show($id)
    {
        if (!auth()->user()->hasPermissionTo('supplier_view')) {
            abort(403, 'Unauthorized action.');
        }

        $supplier = $this->suppliersRepository->find($id);
        if (empty($supplier)) {
            Flash::error('Supplier not found');
            return redirect(route('suppliers.index'));
        }

        if (!$supplier->account_id) {
            Flash::error('Supplier has no associated account_id. Run /suppliers/update-accounts to create accounts.');
            return redirect(route('suppliers.index'));
        }

        $files = Transactions::where('account_id', $supplier->account_id)->get();

        return view('suppliers.show', [
            'supplier' => $supplier,
            'files' => $files
        ]);
    }

public function edit($id)
{
    $supplier = $this->suppliersRepository->find($id);
    if (empty($supplier)) {
        Flash::error('Supplier not found');
        return redirect(route('suppliers.index'));
    }
    return view('suppliers.edit')->with('supplier', $supplier);
}

    public function update( Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'company_name' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $supplier->update($validated);

        $supplier = Supplier::all();

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');

       $parentAccount = Accounts::updateOrCreate(
        ['name' => 'Supplier', 'account_type' => 'Liability', 'parent_id' => null],
        ['name' => 'Supplier', 'account_type' => 'Liability', 'account_code' => Account::code()]
    );

    foreach ($supplier as $supplier) {
        $account = new Accounts();
        $account->account_code = 'SUP' . str_pad($supplier->id, 4, "0", STR_PAD_LEFT);
        $account->name = $supplier->name;
        $account->account_type = 'Liability';
        $account->ref_name = 'Supplier';
        $account->parent_id = $parentAccount->id;
        $account->ref_id = $supplier->id;
        $account->save();

        $supplier->account_id = $account->id;
        $supplier->save();
    }

    

    }

    public function destroy(Supplier $supplier)
{
    // Delete the associated Chart of Account entry
    if ($supplier->account_id) {
        Accounts::where('id', $supplier->account_id)->delete();
    }

    // Then delete the supplier
    $supplier->delete();

    return redirect()->route('suppliers.index')->with('success', 'Supplier and its account deleted successfully.');
}

    public function ledger($id, LedgerDataTable $ledgerDataTable)
    {
        if (!auth()->user()->hasPermissionTo('supplier_view')) {
            abort(403, 'Unauthorized action.');
        }

        $supplier = $this->suppliersRepository->find($id);
        if (empty($supplier)) {
            Flash::error('Supplier not found');
            return redirect(route('suppliers.index'));
        }

        if (!$supplier->account_id) {
            Flash::error('Supplier has no associated account_id. Run /suppliers/update-accounts to create accounts.');
            return redirect(route('suppliers.index'));
        }

        $files = Transactions::where('account_id', $supplier->account_id)->get();
        $account_id = $supplier->account_id;

        return $ledgerDataTable->with(['account_id' => $account_id])
            ->render('suppliers.ledger', [
                'supplier' => $supplier,
                'files' => $files,
                'dataTable' => $ledgerDataTable
            ]);
    }



}
