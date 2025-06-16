<div class="row">
    <div class="form-group col-md-3">
        <label for="posted_date">Posted Date *</label>
        <input type="date" class="form-control" name="posted_date" value="{{ old('posted_date', $rtaFine->posted_date ?? '') }}" required>
    </div>

    <div class="form-group col-md-3">
        <label for="fine_date">Fine Date *</label>
        <input type="date" class="form-control" name="fine_date" value="{{ old('fine_date', $rtaFine->fine_date ?? '') }}" required>
    </div>

    <div class="form-group col-md-3">
        <label for="ref_id">Ref .ID *</label>
        <input type="text" class="form-control" name="ref_id" value="{{ old('ref_id', $rtaFine->ref_id ?? '') }}" required>
    </div>

    <div class="form-group col-md-3">
        <label>Category *</label>
        <input type="text" class="form-control" name="category" value="Vehicle" readonly>
    </div>

    <div class="form-group col-md-3">
        <label>Expense Head *</label>
        <input type="text" class="form-control" value="Traffic Fine" readonly>
    </div>

    <div class="form-group col-md-3">
        <label for="surcharge_account">Surcharge Account</label>
        <input type="text" class="form-control" name="surcharge_account" value="{{ old('surcharge_account', $rtaFine->surcharge_account ?? '') }}">
    </div>

    <div class="form-group col-md-3">
        <label for="cr_account">Cr. Account *</label>
        <select name="cr_account" class="form-control" required>
            <option value="">Search Account by code or title</option>
            {{-- @foreach($accounts as $id => $title)
                <option value="{{ $id }}" {{ old('cr_account', $rtaFine->cr_account ?? '') == $id ? 'selected' : '' }}>{{ $title }}</option>
            @endforeach --}}
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="vehicle">Vehicle *</label>
        <select name="vehicle" class="form-control" required>
            <option value="">Search Item</option>
            {{-- Populate options dynamically --}}
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="employee">Employee *</label>
        <select name="employee" class="form-control" required>
            <option value="">Search code or Name</option>
            {{-- Populate options dynamically --}}
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="expense_account">Expense Account *</label>
        <select name="expense_account" class="form-control" required>
            <option value="">Search Account by code or title</option>
            {{-- Populate options dynamically --}}
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="debit_account">Debit Account *</label>
        <select name="debit_account" class="form-control" required>
            <option value="">Search Account by code or title</option>
            {{-- Populate options dynamically --}}
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="allowed_amount">Allowed Amount *</label>
        <input type="number" class="form-control" name="allowed_amount" value="{{ old('allowed_amount', $rtaFine->allowed_amount ?? '') }}" required>
    </div>

    <div class="form-group col-md-3">
        <label for="exp_amount">Exp. Amount *</label>
        <input type="number" class="form-control" name="exp_amount" value="{{ old('exp_amount', $rtaFine->exp_amount ?? 0) }}" required>
    </div>

    <div class="form-group col-md-3">
        <label for="surcharge_amount">Surcharge Amount</label>
        <input type="number" class="form-control" name="surcharge_amount" value="{{ old('surcharge_amount', $rtaFine->surcharge_amount ?? '') }}">
    </div>

    <div class="form-group col-md-3">
        <label for="total_chargeable">Total Chargeable Amount</label>
        <input type="number" class="form-control" name="total_chargeable" value="{{ old('total_chargeable', $rtaFine->total_chargeable ?? '') }}">
    </div>

    <div class="form-group col-md-6">
        <label for="remarks">Remarks</label>
        <input type="text" class="form-control" name="remarks" value="{{ old('remarks', $rtaFine->remarks ?? '') }}">
    </div>

    <div class="form-group col-md-6">
        <label for="attachment">Attachment</label>
        <input type="file" class="form-control-file" name="attachment">
    </div>
</div>
