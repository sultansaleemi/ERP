<script src="{{ asset('js/modal_custom.js') }}"></script>
<!-- Plate Field -->
<div class="form-group col-sm-4">
    {!! Form::label('plate', 'Number Plate:',['class'=>'required']) !!}
    {!! Form::text('plate', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Chassis Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('chassis_number', 'Chassis Number:',['class'=>'required']) !!}
    {!! Form::text('chassis_number', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-4">
    {!! Form::label('color', 'Color:',['class'=>'required']) !!}
    {!! Form::text('color', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-4">
    {!! Form::label('model', 'Model:',['class'=>'required']) !!}
    {!! Form::text('model', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Model Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('model_type', 'Model Type:',['class'=>'required']) !!}
    {!! Form::text('model_type', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Engine Field -->
<div class="form-group col-sm-4">
    {!! Form::label('engine', 'Engine:',['class'=>'required']) !!}
    {!! Form::text('engine', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

 <!-- Company Field -->
<div class="form-group col-sm-4">
    {!! Form::label('company', 'Company:',['class'=>'required']) !!}
    {!! Form::select('company', App\Models\LeasingCompanies::dropdown(),null, ['class' => 'form-control select2', 'required']) !!}
</div>
{{--
<!-- Warehouse Field -->
<div class="form-group col-sm-4">
    {!! Form::label('warehouse', 'Warehouse:') !!}
    {!! Form::text('warehouse', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div> --}}

<!-- Traffic File Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('traffic_file_number', 'Traffic File Number:') !!}
    {!! Form::text('traffic_file_number', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Emirates Field -->
<div class="form-group col-sm-4">
    {!! Form::label('emirates', 'Emirates:') !!}
    {!! Form::text('emirates', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Bike Code Field -->
<div class="form-group col-sm-4">
    {!! Form::label('bike_code', 'Bike Code:') !!}
    {!! Form::text('bike_code', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Registration Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('registration_date', 'Registration Date:') !!}
    {!! Form::date('registration_date', null, ['class' => 'form-control','id'=>'registration_date']) !!}
</div>

<!-- Expiry Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
    {!! Form::date('expiry_date', null, ['class' => 'form-control','id'=>'expiry_date']) !!}
</div>
<!-- Insurance Expiry Field -->
<div class="form-group col-sm-4">
    {!! Form::label('insurance_expiry', 'Insurance Expiry:') !!}
    {!! Form::date('insurance_expiry', null, ['class' => 'form-control','id'=>'insurance_expiry']) !!}
</div>
<!-- Insurance Co Field -->
<div class="form-group col-sm-4">
    {!! Form::label('insurance_co', 'Insurance Co:') !!}
    {!! Form::text('insurance_co', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Policy No Field -->
<div class="form-group col-sm-4">
    {!! Form::label('policy_no', 'Policy No:') !!}
    {!! Form::text('policy_no', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<div class="form-group col-sm-4">
  {!! Form::label('contract_number', 'Contract No:') !!}
  {!! Form::text('contract_number', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('notes', 'Notes:') !!}
  {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>
<!-- Status Field -->
<div class="form-group col-sm-6 mt-3">
  <label>Status</label>
  <div class="form-check">
    <input type="hidden" name="status" value="2"/>
     <input type="checkbox" name="status" id="status" class="form-check-input" value="1" @isset($bikes) @if($bikes->status == 1) checked @endif @else checked  @endisset/>
     <label for="status" class="pt-0">Is Active</label>

  </div>
</div>
