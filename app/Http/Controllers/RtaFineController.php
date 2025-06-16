<?php

namespace App\Http\Controllers;

use App\Models\RtaFine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RtaFineController extends Controller
{
   public function index(RtaFinesDataTable $dataTable)
{
    return $dataTable->render('rta_fines.index');
}

    public function create()
    {
        return view('rta_fines.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'posted_date' => 'required|date',
            'fine_date' => 'required|date',
            'ref_id' => 'required|string|max:255',
            'allowed_amount' => 'required|numeric',
            'exp_amount' => 'required|numeric',
            // Add other validations as needed
        ]);

        $validated['category'] = 'Vehicle'; // default
        $validated['attachment'] = null;

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        RtaFine::create($validated);

        return redirect()->route('rta-fines.index')->with('success', 'Fine created successfully.');
    }

    public function show(RtaFine $rtaFine)
    {
        return view('rta_fines.show', compact('rtaFine'));
    }

    public function edit(RtaFine $rtaFine)
    {
        return view('rta_fines.edit', compact('rtaFine'));
    }

    public function update(Request $request, RtaFine $rtaFine)
    {
        $validated = $request->validate([
            'posted_date' => 'required|date',
            'fine_date' => 'required|date',
            'ref_id' => 'required|string|max:255',
            'allowed_amount' => 'required|numeric',
            'exp_amount' => 'required|numeric',
        ]);

        $validated['category'] = 'Vehicle'; // fixed category

        if ($request->hasFile('attachment')) {
            if ($rtaFine->attachment) {
                Storage::disk('public')->delete($rtaFine->attachment);
            }
            $validated['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        $rtaFine->update($validated);

        return redirect()->route('rta-fines.index')->with('success', 'Fine updated successfully.');
    }

    public function destroy(RtaFine $rtaFine)
    {
        if ($rtaFine->attachment) {
            Storage::disk('public')->delete($rtaFine->attachment);
        }

        $rtaFine->delete();

        return redirect()->route('rta-fines.index')->with('success', 'Fine deleted successfully.');
    }

    public function pay($id)
{
    $fine = RtaFine::findOrFail($id);
    // Your logic here, e.g., show payment form or mark as paid
    return view('rta_fines.pay', compact('fine'));
}

}
