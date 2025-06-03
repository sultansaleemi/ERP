
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Vendor Name:', ['class' => 'required']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'required']) !!}
</div>

<!-- Contact Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_number', 'Contact Number:', ['class' => 'required']) !!}
    {!! Form::text('contact_number', null, ['class' => 'form-control', 'maxlength' => 100, 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:', ['class' => 'required']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => 100, 'required']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:', ['class' => 'required']) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'maxlength' => 200, 'required']) !!}
</div>

<!-- Vendor Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_type', 'Vendor Type:', ['class' => 'required']) !!}
    {!! Form::select('vendor_type', ['Individual' => 'Individual', 'Company' => 'Company'], null, ['class' => 'form-control', 'required']) !!}
</div>
    