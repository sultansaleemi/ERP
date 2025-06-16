@extends('layouts.app')

@section('title', 'Add Traffic Fine')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <h3>Traffic Fines Form</h3>
    </div>
</section>

<div class="content px-3">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('rta-fines.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Posted Date --}}
                    <div class="form-group col-md-3">
                        <label for="posted_date">Posted Date *</label>
                        <input type="date" class="form-control" name="posted_date" required>
                    </div>

                    {{-- Fine Date --}}
                    <div class="form-group col-md-3">
                        <label for="fine_date">Fine Date *</label>
                        <input type="date" class="form-control" name="fine_date" required>
                    </div>

                    {{-- Ref ID --}}
                    <div class="form-group col-md-3">
                        <label for="ref_id">Ref .ID *</label>
                        <input type="text" class="form-control" name="ref_id" required>
                    </div>

                    {{-- Category (readonly/fixed) --}}
                    <div class="form-group col-md-3">
                        <label for="category">Category *</label>
                        <input type="text" class="form-control" name="category" value="Vehicle" readonly>
                    </div>

                    {{-- Expense Head --}}
                    <div class="form-group col-md-3">
                        <label>Expense Head *</label>
                        <input type="text" class="form-control" value="Traffic Fine" readonly>
                    </div>

                    {{-- Surcharge Account --}}
                    <div class="form-group col-md-3">
                        <label for="surcharge_account">Surcharge Account</label>
                        <input type="text" class="form-control" name="surcharge_account">
                    </div>

                    {{-- Cr. Account --}}
                    <div class="form-group col-md-3">
                        <label for="cr_account">Cr. Account *</label>
                        <select name="cr_account" class="form-control" required>
                            <option value="">Search Account by code or title</option>
                            {{-- Populate dynamically --}}
                        </select>
                    </div>

                    {{-- Vehicle --}}
                    <div class="form-group col-md-3">
                        <label for="vehicle">Vehicle *</label>
                        <select name="vehicle" class="form-control" required>
                            <option value="">Search Item</option>
                            {{-- Populate dynamically --}}
                        </select>
                    </div>

                    {{-- Employee --}}
                    <div class="form-group col-md-3">
                        <label for="employee">Employee *</label>
                        <select name="employee" class="form-control" required>
                            <option value="">Search code or Name</option>
                            {{-- Populate dynamically --}}
                        </select>
                    </div>

                    {{-- Expense Account --}}
                    <div class="form-group col-md-3">
                        <label for="expense_account">Expense Account *</label>
                        <select name="expense_account" class="form-control" required>
                            <option value="">Search Account by code or title</option>
                            {{-- Populate dynamically --}}
                        </select>
                    </div>

                    {{-- Debit Account --}}
                    <div class="form-group col-md-3">
                        <label for="debit_account">Debit Account *</label>
                        <select name="debit_account" class="form-control" required>
                            <option value="">Search Account by code or title</option>
                            {{-- Populate dynamically --}}
                        </select>
                    </div>

                    {{-- Allowed Amount --}}
                    <div class="form-group col-md-3">
                        <label for="allowed_amount">Allowed Amount *</label>
                        <input type="number" name="allowed_amount" class="form-control" required>
                    </div>

                    {{-- Exp Amount --}}
                    <div class="form-group col-md-3">
                        <label for="exp_amount">Exp. Amount *</label>
                        <input type="number" name="exp_amount" class="form-control" required>
                    </div>

                    {{-- Surcharge Amount --}}
                    <div class="form-group col-md-3">
                        <label for="surcharge_amount">Surcharge Amount</label>
                        <input type="number" name="surcharge_amount" class="form-control">
                    </div>

                    {{-- Total Chargeable Amount --}}
                    <div class="form-group col-md-3">
                        <label for="total_chargeable">Total Chargeable Amount</label>
                        <input type="number" name="total_chargeable" class="form-control">
                    </div>

                    {{-- Remarks --}}
                    <div class="form-group col-md-6">
                        <label for="remarks">Remarks</label>
                        <input type="text" name="remarks" class="form-control">
                    </div>

                    {{-- Attachment --}}
                    <div class="form-group col-md-6">
                        <label for="attachment">Attachment</label><br>
                        <input type="file" name="attachment" class="form-control-file">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('rta-fines.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
