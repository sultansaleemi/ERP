<?php

namespace App\Http\Controllers;

use App\DataTables\VendorsDataTable;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Helpers\Account;
use App\Http\Controllers\AppBaseController;
use App\Repositories\VendorRepository;

class VendorController extends AppBaseController
{
    public function index(VendorsDataTable $dataTable)
    {
        return $dataTable->render('vendors.index');
    }

    public function create()
    {
        return view('vendors.create');
    }

    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepo)
    {
        $this->vendorRepository = $vendorRepo;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:vendors,name',
            'email' => 'nullable|email',
            'contact_number' => 'nullable|string',
            'company_name' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
    
        $vendor = Vendor::create($validated);
    
        // Create or get parent "Vendor" account
        $parentAccount = Accounts::firstOrCreate(
            ['name' => 'Vendor', 'account_type' => 'Liability', 'parent_id' => null],
            ['name' => 'Vendor', 'account_type' => 'Liability', 'account_code' => Account::code()]
        );
    
        // Create linked account in chart of accounts
        $account = new Accounts();
        $account->account_code = 'VND' . str_pad($vendor->id, 4, "0", STR_PAD_LEFT);
        $account->account_type = 'Liability';
        $account->name = $vendor->name;
        $account->parent_id = $parentAccount->id;
        $account->ref_name = 'Vendor';
        $account->ref_id = $vendor->id;
        $account->status = 1;
        $account->save();
    
        // Optional: link account_id in Vendor model if needed
        // $vendor->account_id = $account->id;
        // $vendor->save();
    
        return response()->json(['message' => 'Vendor created successfully.']);
    }

    public function show(Vendor $vendor)
    {
        return view('vendors.show', compact('vendor'));
    }

    public function edit(Vendor $vendor)
    {
        return view('vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'contact_numer' => 'nullable|string',
            'address' => 'nullable|string',
            'vendor_type' => 'nullable|string',
        ]);

        $vendor->update($validated);

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy($id)
{
    $vendor = $this->vendorRepository->find($id);

    if (empty($vendor)) {
        return response()->json(['errors' => ['error' => 'Vendor not found!']], 422);
    }

    // Delete from Chart of Account
    $account = \App\Models\Accounts::where('ref_name', 'Vendor')->where('ref_id', $vendor->id)->first();
    if ($account) {
        $account->delete();
    }

    $vendor->delete();

    return response()->json(['message' => 'Vendor deleted successfully.']);
}


}
