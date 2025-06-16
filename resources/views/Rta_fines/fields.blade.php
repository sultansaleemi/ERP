<!-- RTA Fine Form Fields -->

<!-- Posted Date -->
<div class="form-group col-sm-3">
    {!! Form::label('posted_date', 'Posted Date:', ['class' => 'required']) !!}
    {!! Form::date('posted_date', old('posted_date', $rtaFine->posted_date ?? null), ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fine Date -->
<div class="form-group col-sm-3">
    {!! Form::label('fine_date', 'Fine Date:', ['class' => 'required']) !!}
    {!! Form::date('fine_date', old('fine_date', $rtaFine->fine_date ?? null), ['class' => 'form-control', 'required']) !!}
</div>

<!-- Ref ID -->
<div class="form-group col-sm-3">
    {!! Form::label('ref_id', 'Ref. ID:', ['class' => 'required']) !!}
    {!! Form::text('ref_id', old('ref_id', $rtaFine->ref_id ?? null), ['class' => 'form-control', 'required']) !!}
</div>

<!-- Category -->
<div class="form-group col-sm-3">
    {!! Form::label('category', 'Category:', ['class' => 'required']) !!}
    {!! Form::text('category', 'Vehicle', ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Expense Head -->
<div class="form-group col-sm-3">
    {!! Form::label('expense_head', 'Expense Head:', ['class' => 'required']) !!}
    {!! Form::text('expense_head', 'Traffic Fine', ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Surcharge Account -->
<div class="form-group col-sm-3">
    {!! Form::label('surcharge_account', 'Surcharge Account:') !!}
    {!! Form::text('surcharge_account', old('surcharge_account', $rtaFine->surcharge_account ?? null), ['class' => 'form-control']) !!}
</div>

<!-- Cr. Account -->
<div class="form-group col-sm-3">
    {!! Form::label('cr_account', 'Cr. Account:', ['class' => 'required']) !!}
    {!! Form::select('account_id[]', App\Models\Accounts::dropdown(null), null, ['class' => 'form-select form-select-md select2']) !!}
</div>

<!-- Vehicle -->
<div class="form-group col-sm-3">
    {!! Form::label('vehicle', 'Vehicle:', ['class' => 'required']) !!}
{!! Form::select('vehicle', $bikes, null, ['class' => 'form-control select2', 'required']) !!}

</div>

<!-- Employee -->
<div class="form-group col-sm-3">
    {!! Form::label('employee', 'Employee:', ['class' => 'required']) !!}
          {!! Form::select('account_id[]', App\Models\Accounts::dropdown(null), null, ['class' => 'form-select form-select-sm select2']) !!}
</div>

<!-- Expense Account -->
<div class="form-group col-sm-3">
    {!! Form::label('expense_account', 'Expense Account:', ['class' => 'required']) !!}
          {!! Form::select('account_id[]', App\Models\Accounts::dropdown(null), null, ['class' => 'form-select form-select-sm select2']) !!}
</div>

<!-- Debit Account -->
<div class="form-group col-sm-3">
    {!! Form::label('debit_account', 'Debit Account:', ['class' => 'required']) !!}
{!! Form::select('debit_account', $riders, old('debit_account', $rtaFine->debit_account ?? null), ['class' => 'form-control', 'required']) !!}
</div>

<!-- Allowed Amount -->
<div class="form-group col-sm-3">
    {!! Form::label('allowed_amount', 'Allowed Amount:', ['class' => 'required']) !!}
    {!! Form::number('allowed_amount', old('allowed_amount', $rtaFine->allowed_amount ?? null), ['class' => 'form-control', 'required']) !!}
</div>

<!-- Exp. Amount -->
<div class="form-group col-sm-3">
    {!! Form::label('exp_amount', 'Exp. Amount:', ['class' => 'required']) !!}
    {!! Form::number('exp_amount', old('exp_amount', $rtaFine->exp_amount ?? 0), ['class' => 'form-control', 'required']) !!}
</div>

<!-- Surcharge Amount -->
<div class="form-group col-sm-3">
    {!! Form::label('surcharge_amount', 'Surcharge Amount:') !!}
    {!! Form::number('surcharge_amount', old('surcharge_amount', $rtaFine->surcharge_amount ?? null), ['class' => 'form-control']) !!}
</div>

<!-- Total Chargeable -->
<div class="form-group col-sm-3">
    {!! Form::label('total_chargeable', 'Total Chargeable Amount:') !!}
    {!! Form::number('total_chargeable', old('total_chargeable', $rtaFine->total_chargeable ?? null), ['class' => 'form-control']) !!}
</div>

<!-- Remarks -->
<div class="form-group col-sm-6">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::text('remarks', old('remarks', $rtaFine->remarks ?? null), ['class' => 'form-control']) !!}
</div>

<!-- Attachment -->
<div class="form-group col-sm-6">
    {!! Form::label('attachment', 'Attachment:') !!}
    {!! Form::file('attachment', ['class' => 'form-control']) !!}
</div>
