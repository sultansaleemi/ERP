

<!-- Rider Id Field -->
<div class="form-group col-sm-3">
  {!! Form::label('rider_id', 'Rider ID:',['class'=>'required']) !!}
  {!! Form::number('rider_id', null, ['class' => 'form-control','required']) !!}
</div>
 <!-- Name Field -->

<div class="form-group col-sm-3">
    {!! Form::label('name', 'Name:',['class'=>'required']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 191, 'required' => 'required']) !!}
</div>


<!-- Personal Contact Field -->
<div class="form-group col-sm-3">
    {!! Form::label('personal_contact', 'Rider Contact:') !!}
    {!! Form::tel('personal_contact', null, ['class' => 'form-control', 'placeholder' => '+9715XXXXXXXX', 'maxlength' => 13]) !!}
</div>

<!-- Company Contact Field -->
<div class="form-group col-sm-3">
    {!! Form::label('company_contact', 'Company Contact:') !!}
    {!! Form::tel('company_contact', null, ['class' => 'form-control', 'placeholder' => '+9715XXXXXXXX', 'maxlength' => 13]) !!}
</div>

<!-- Personal Email Field -->
<div class="form-group col-sm-3">
    {!! Form::label('personal_email', 'Personal Email:',['class'=>'required']) !!}
    {!! Form::email('personal_email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email ID','maxlength' => 191, 'required']) !!}
</div>

<!-- Email Field -->
{{-- <div class="form-group col-sm-3">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div> --}}

<!-- Nationality Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nationality', 'Nationality:',['class'=>'required']) !!}
    <!-- {!! Form::select('nationality', App\Models\Countries::list(), 'Select Nationality', ['class' => 'form-control form-select select2 ','required']) !!} -->
    {!! Form::select('nationality', 
        ['' => 'Select Nationality'] + App\Models\Countries::list()->toArray(), 
        null, 
        [
            'class' => 'form-control form-select select2',
            'required',
            'placeholder' => 'Select Nationality'  // Optional for better UI
        ]) !!}
</div>

<!-- Ethnicity Field -->
<div class="form-group col-sm-3">
  {!! Form::label('ethnicity', 'Ethnicity:') !!}
  <!-- {!! Form::select('ethnicity',Common::Dropdowns('ethnicity'), null, ['class' => 'form-select', 'maxlength' => 191, 'maxlength' => 191]) !!} -->
{!! Form::select('ethnicity', 
    ['' => 'Select Ethnicity'] + Common::Dropdowns('ethnicity'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 191,
        'placeholder' => 'Select Ethnicity'
    ]) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-3">
  {!! Form::label('dob', 'Date Of Birth:') !!}
  {!! Form::date('dob', null, ['class' => 'form-control','id'=>'dob']) !!}
</div>

<!-- Doj Field -->
<div class="form-group col-sm-3">
  {!! Form::label('doj', 'Date Of Joining:',['class'=>'required']) !!}
  {!! Form::date('doj', null, ['class' => 'form-control','id'=>'doj','required']) !!}
</div>
<!-- Designation Field -->
<div class="form-group col-sm-3">
  {!! Form::label('designation', 'Designation:',['class'=>'required']) !!}
  <!-- {!! Form::select('designation',Common::Dropdowns('designation'), null, ['class' => 'form-select', 'required']) !!} -->
  {!! Form::select('designation', 
    ['' => 'Select designation'] + Common::Dropdowns('designation'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 191,
        'placeholder' => 'Select designation'
    ]) !!}
</div>

<!-- Visa Sponsor Field -->
<div class="form-group col-sm-3">
  {!! Form::label('visa_sponsor', 'Visa Sponsor:') !!}
  {!! Form::text('visa_sponsor', null, ['class' => 'form-control', 'placeholder' => 'Enter Visa Sponsor', 'maxlength' => 100]) !!}
</div>


<!-- Visa Occupation Field -->
<div class="form-group col-sm-3">
  {!! Form::label('visa_occupation', 'Visa Occupation:',['class'=>'required']) !!}
  {!! Form::text('visa_occupation', null, ['class' => 'form-control', 'placeholder' => 'Enter Visa Occupation','maxlength' => 100, 'required' ]) !!}
</div>
<!-- Visa Status Field -->
<div class="form-group col-sm-3">
  {!! Form::label('visa_status', 'Visa Status:') !!}
  <!-- {!! Form::select('visa_status',Common::Dropdowns('visa-status'), null, ['class' => 'form-select']) !!} -->
  {!! Form::select('visa_status', 
    ['' => 'Select Visa Status'] + Common::Dropdowns('visa-status'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 191,
        'placeholder' => 'Select Visa Status'
    ]) !!}
</div>

<!-- Person Code Field -->
<div class="form-group col-sm-3">
  {!! Form::label('person_code', 'Person Code:') !!}
  {!! Form::text('person_code', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Labor Card Number Field -->
<div class="form-group col-sm-3">
  {!! Form::label('labor_card_number', 'Labor Card Number:') !!}
  {!! Form::text('labor_card_number', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Labor Card Expiry Field -->
<div class="form-group col-sm-3">
  {!! Form::label('labor_card_expiry', 'Labor Card Expiry:') !!}
  {!! Form::date('labor_card_expiry', null, ['class' => 'form-control','id'=>'labor_card_expiry']) !!}
</div>


<!-- Insurance Field -->
<div class="form-group col-sm-3">
  {!! Form::label('insurance', 'Insurance:') !!}
  <!-- {!! Form::select('insurance',Common::Dropdowns('insurance'), null, ['class' => 'form-select']) !!} -->
  {!! Form::select('insurance', 
    ['' => 'Select insurance'] + Common::Dropdowns('insurance'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 191,
        'placeholder' => 'Select insurance'
    ]) !!}
</div>

<!-- Insurance Expiry Field -->
<div class="form-group col-sm-3">
  {!! Form::label('insurance_expiry', 'Insurance Expiry:') !!}
  {!! Form::date('insurance_expiry', null, ['class' => 'form-control','id'=>'insurance_expiry']) !!}
</div>


<!-- Policy No Field -->
<div class="form-group col-sm-3">
  {!! Form::label('policy_no', 'Policy No:') !!}
  {!! Form::text('policy_no', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Cdm Deposit Id Field -->
<div class="form-group col-sm-3">
  {!! Form::label('cdm_deposit_id', 'CDM Deposit ID:') !!}
  {!! Form::text('cdm_deposit_id', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Mashreq Id Field -->
<div class="form-group col-sm-3">
  {!! Form::label('mashreq_id', 'Mashreq Id:') !!}
  {!! Form::text('mashreq_id', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>
<!-- Branded Plate No Field -->
<div class="form-group col-sm-3">
  {!! Form::label('branded_plate_no', 'Branded Plate No:') !!}
  {!! Form::text('branded_plate_no', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Fleet Supervisor Field -->
<div class="form-group col-sm-3">
  {!! Form::label('fleet_supervisor', 'Fleet Supervisor:',['class'=>'required']) !!}
  <!-- {!! Form::select('fleet_supervisor',  Common::Dropdowns('fleet-supervisor'),null, ['class' => 'form-select', 'maxlength' => 50, 'required']) !!} -->
  {!! Form::select('fleet_supervisor', 
    ['' => 'Select Fleet Supervisor'] + Common::Dropdowns('fleet-supervisor'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 50,
        'placeholder' => 'Select Fleet Supervisor'
    ]) !!}
</div>

<!-- Salary Model Field -->
<div class="form-group col-sm-3">
  {!! Form::label('salary_model', 'Salary Model:',['class'=>'required']) !!}
  <!-- {!! Form::select('salary_model',Common::Dropdowns('salary-model'), null, ['class' => 'form-select','required']) !!} -->
  {!! Form::select('salary_model', 
    ['' => 'Select Salary Model'] + Common::Dropdowns('salary-model'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 50,
        'placeholder' => 'Select Salary Model'
    ]) !!}
</div>

<!-- Rider Reference Field -->
<div class="form-group col-sm-3">
  {!! Form::label('rider_reference', 'Rider Reference:',['class'=>'required']) !!}
  {!! Form::text('rider_reference', null, ['class' => 'form-control', 'maxlength' => 255, 'required']) !!}
</div>

<!-- Emirate Hub Field -->
<div class="form-group col-sm-3">
  {!! Form::label('emirate_hub', 'Emirate Hub:',['class'=>'required']) !!}
  {!! Form::select('emirate_hub',Common::Dropdowns('emirates-hub'),null, ['class' => 'form-select', 'maxlength' => 191, 'required']) !!}
</div>

<!-- Emirate Id Field -->
<div class="form-group col-sm-3">
  {!! Form::label('emirate_id', 'Emirate ID:',['class'=>'required']) !!}
  {!! Form::text('emirate_id', null, ['class' => 'form-control', 'maxlength' => 191, 'required' ]) !!}
</div>

<!-- Emirate Exp Field -->
<div class="form-group col-sm-3">
  {!! Form::label('emirate_exp', 'Emirate Expiry:',['class'=>'required']) !!}
  {!! Form::date('emirate_exp', null, ['class' => 'form-control','id'=>'emirate_exp','required']) !!}
</div>

<!-- License No Field -->
<div class="form-group col-sm-3">
  {!! Form::label('license_no', 'License No:',['class'=>'required']) !!}
  {!! Form::text('license_no', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- License Expiry Field -->
<div class="form-group col-sm-3">
  {!! Form::label('license_expiry', 'License Expiry:',['class'=>'required']) !!}
  {!! Form::date('license_expiry', null, ['class' => 'form-control','id'=>'license_expiry']) !!}
</div>


<!-- Passport Field -->
<div class="form-group col-sm-3">
  {!! Form::label('passport', 'Passport:',['class'=>'required']) !!}
  {!! Form::text('passport', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Passport Expiry Field -->
<div class="form-group col-sm-3">
  {!! Form::label('passport_expiry', 'Passport Expiry:',['class'=>'required']) !!}
  {!! Form::date('passport_expiry', null, ['class' => 'form-control','id'=>'passport_expiry']) !!}
</div>

<!-- Passport Handover Field -->
<div class="form-group col-sm-3">
  {!! Form::label('passport_handover', 'Passport Handover:',['class'=>'required']) !!}
  <!-- {!! Form::select('passport_handover',Common::Dropdowns('passport-handover'), null, ['class' => 'form-select', 'maxlength' => 50, 'maxlength' => 50]) !!} -->
  {!! Form::select('passport_handover', 
    ['' => 'Select Passport Handover'] + Common::Dropdowns('passport-handover'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 50,
        'placeholder' => 'Select Passport Handover'
    ]) !!}
</div>

<!-- Wps Field -->
<div class="form-group col-sm-3">
  {!! Form::label('wps', 'Wps:') !!}
  <!-- {!! Form::select('wps',Common::Dropdowns('wps'), null, ['class' => 'form-select', 'maxlength' => 100, 'maxlength' => 100]) !!} -->
  {!! Form::select('wps', 
    ['' => 'Select wps'] + Common::Dropdowns('wps'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 50,
        'placeholder' => 'Select wps'
    ]) !!}
</div>

<!-- C3 Card Field -->
<div class="form-group col-sm-3">
  {!! Form::label('c3_card', 'C3 Card:') !!}
  <!-- {!! Form::select('c3_card',Common::Dropdowns('c3-card'), null, ['class' => 'form-select', 'maxlength' => 100, 'maxlength' => 100]) !!} -->
  {!! Form::select('c3_card', 
    ['' => 'Select C3 Card'] + Common::Dropdowns('c3-card'), 
    null, 
    [
        'class' => 'form-select',
        'maxlength' => 50,
        'placeholder' => 'Select C3 Card'
    ]) !!}
</div>

<!-- Other Details Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('other_details', 'Other Details:') !!}
  {!! Form::textarea('other_details', null, ['class' => 'form-control', 'rows' => 2]) !!}
</div>
<style>
.borderless tr td {
  border: none !important;
  padding-bottom: 0px !important;
}
</style>
  <div class="row pr-5 pl-5" >
  <label><h5>Assign Price</h5></label>
  <span id="error_message_duplicate_id"></span>
  <div id="rows-container">

        @php
        $counter = 1;
        $sum = 1;
      @endphp
          @if(isset($riders['items']) && count($riders['items'])>0)
      @php
      $resultItems = $riders['items']; @endphp
            @foreach($resultItems as $rowItem)
            @php $sum = count($riders['items']);
            @endphp
      <div class="row">
          <div class="col-sm-4">
            <label>Select Items</label>
          <select value="0" name="items[id][]" class="form-select select2" required>
            <option value="0">Select Item</option>
            @php
                $items = \App\Models\Items::all();
            @endphp
          @foreach($items as $item)
                <option value="{{$item->id}}"
                  @if(isset($rowItem->item_id) && $rowItem->item_id == $item->id) selected @endif
                  >{{$item->name.' - '.$item->price}}</option>
          @endforeach
          </select>
          <span id="notification1" style="font-size: 13px;color:red"></span>
          </div>
          <div class="col-sm-4">
          <label>Price</label>
            <input type="number" class="form-control" step="any" value="@if(isset($rowItem)){{(int)$rowItem->price}}@endif"
            name="items[price][]" id="item_price" placeholder="Items Price"/>
          </div>
          <div class="col-sm-2">
            <label></label>
            <a href="javascript:void(0);" class="text-danger btn-remove-row"><i class="fa fa-close"></i></a>
          </div>
        </div>
    @php
      if(isset($riders))
      $counter++;
      @endphp
      @endforeach
      @else
      <div class="row">
      <div class="col-sm-4">
        <label>Select Items</label>
        {{-- select2 --}}
      <select value="0" name="items[id][]" class="form-select select2"
      id="item_id" required>
        <option value="0">Select Item</option>
        @php
            $items = \App\Models\Items::all();
        @endphp
      @foreach($items as $item)
            <option value="{{$item->id}}"
              {{-- @if(isset($rowItem->item_id) && $rowItem->item_id == $item->id) selected @endif --}}
              >{{$item->name.' - '.$item->price}}</option>
      @endforeach
      </select>
      <span id="notification1" style="font-size: 13px;color:red"></span>
      </div>
      <div class="col-sm-4">
      <label>Price</label>
        <input type="number" class="form-control" step="any" value="@if(isset($rowItem)) $rowItem->price @endif"
        name="items[price][]" id="item_price" placeholder="Items Price"/>
      </div>
      <div class="col-sm-4">
        <label></label>
        <a href="javascript:void(0);" class="text-danger btn-remove-row"><i class="fa fa-close"></i></a>
      </div>

    </div>
      @endif
</div>

<button type="button" class="btn btn-success btn-sm mt-3 mb-3 col-sm-2" id="add-new-row">
  <i class="fa fa-plus"></i> Add Row</button>
</div>
