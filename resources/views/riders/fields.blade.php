{{-- <script src="{{ asset('js/modal_custom.js') }}"></script>
 --}}
<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('name', 'Name:',['class'=>'required']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Rider Id Field -->
{{-- <div class="form-group col-sm-3">
    {!! Form::label('rider_id', 'Rider Id:') !!}
    {!! Form::number('rider_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Personal Contact Field -->
<div class="form-group col-sm-3">
    {!! Form::label('personal_contact', 'Personal Contact:') !!}
    {!! Form::text('personal_contact', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Company Contact Field -->
<div class="form-group col-sm-3">
    {!! Form::label('company_contact', 'Company Contact:') !!}
    {!! Form::text('company_contact', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Personal Email Field -->
<div class="form-group col-sm-3">
    {!! Form::label('personal_email', 'Personal Email:') !!}
    {!! Form::text('personal_email', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-3">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Nationality Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nationality', 'Nationality:') !!}
    {!! Form::select('nationality', App\Models\Countries::list(), null, ['class' => 'form-control form-select select2 ']) !!}

</div>

<!-- Nfdid Field -->
<div class="form-group col-sm-3">
    {!! Form::label('NFDID', 'Nfdid:') !!}
    {!! Form::text('NFDID', null, ['class' => 'form-control', 'maxlength' => 191]) !!}
</div>

<!-- Cdm Deposit Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cdm_deposit_id', 'Cdm Deposit Id:') !!}
    {!! Form::text('cdm_deposit_id', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Doj Field -->
<div class="form-group col-sm-3">
    {!! Form::label('doj', 'Date Of Joining:') !!}
    {!! Form::date('doj', null, ['class' => 'form-control','id'=>'doj']) !!}
</div>


<!-- Emirate Hub Field -->
<div class="form-group col-sm-3">
    {!! Form::label('emirate_hub', 'Emirate Hub:') !!}
    {!! Form::text('emirate_hub', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Emirate Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('emirate_id', 'Emirate ID:') !!}
    {!! Form::text('emirate_id', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Emirate Exp Field -->
<div class="form-group col-sm-3">
    {!! Form::label('emirate_exp', 'Emirate Expiry:') !!}
    {!! Form::date('emirate_exp', null, ['class' => 'form-control','id'=>'emirate_exp']) !!}
</div>


<!-- Mashreq Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('mashreq_id', 'Mashreq Id:') !!}
    {!! Form::text('mashreq_id', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Passport Field -->
<div class="form-group col-sm-3">
    {!! Form::label('passport', 'Passport:') !!}
    {!! Form::text('passport', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Passport Expiry Field -->
<div class="form-group col-sm-3">
    {!! Form::label('passport_expiry', 'Passport Expiry:') !!}
    {!! Form::date('passport_expiry', null, ['class' => 'form-control','id'=>'passport_expiry']) !!}
</div>



<!-- Pid Field -->
<div class="form-group col-sm-3">
    {!! Form::label('PID', 'Pid:') !!}
    {!! Form::number('PID', null, ['class' => 'form-control']) !!}
</div>

<!-- Dept Field -->
<div class="form-group col-sm-3">
    {!! Form::label('DEPT', 'Dept:') !!}
    {!! Form::text('DEPT', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Ethnicity Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ethnicity', 'Ethnicity:') !!}
    {!! Form::text('ethnicity', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-3">
    {!! Form::label('dob', 'Date Of Birth:') !!}
    {!! Form::date('dob', null, ['class' => 'form-control','id'=>'dob']) !!}
</div>

<!-- License No Field -->
<div class="form-group col-sm-3">
    {!! Form::label('license_no', 'License No:') !!}
    {!! Form::text('license_no', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- License Expiry Field -->
<div class="form-group col-sm-3">
    {!! Form::label('license_expiry', 'License Expiry:') !!}
    {!! Form::date('license_expiry', null, ['class' => 'form-control','id'=>'license_expiry']) !!}
</div>


<!-- Visa Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('visa_status', 'Visa Status:') !!}
    {!! Form::text('visa_status', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Branded Plate No Field -->
<div class="form-group col-sm-3">
    {!! Form::label('branded_plate_no', 'Branded Plate No:') !!}
    {!! Form::text('branded_plate_no', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Vaccine Status Field -->
<div class="form-group col-sm-3">
    <div class="form-check">
        {!! Form::hidden('vaccine_status', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('vaccine_status', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('vaccine_status', 'Vaccine Status', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Attach Documents Field -->
{{-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('attach_documents', 'Attach Documents:') !!}
    {!! Form::textarea('attach_documents', null, ['class' => 'form-control']) !!}
</div> --}}



<!-- Vid Field -->
<div class="form-group col-sm-3">
    {!! Form::label('VID', 'Vid:') !!}
    {!! Form::number('VID', null, ['class' => 'form-control']) !!}
</div>

<!-- Visa Sponsor Field -->
<div class="form-group col-sm-3">
    {!! Form::label('visa_sponsor', 'Visa Sponsor:') !!}
    {!! Form::text('visa_sponsor', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Visa Occupation Field -->
<div class="form-group col-sm-3">
    {!! Form::label('visa_occupation', 'Visa Occupation:') !!}
    {!! Form::text('visa_occupation', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>




<!-- Fleet Supervisor Field -->
<div class="form-group col-sm-3">
    {!! Form::label('fleet_supervisor', 'Fleet Supervisor:') !!}
    {!! Form::text('fleet_supervisor', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Passport Handover Field -->
<div class="form-group col-sm-3">
    {!! Form::label('passport_handover', 'Passport Handover:') !!}
    {!! Form::text('passport_handover', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Noon No Field -->
<div class="form-group col-sm-3">
    {!! Form::label('noon_no', 'Noon No:') !!}
    {!! Form::text('noon_no', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Wps Field -->
<div class="form-group col-sm-3">
    {!! Form::label('wps', 'Wps:') !!}
    {!! Form::text('wps', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- C3 Card Field -->
<div class="form-group col-sm-3">
    {!! Form::label('c3_card', 'C3 Card:') !!}
    {!! Form::text('c3_card', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Contract Field -->
<div class="form-group col-sm-3">
    {!! Form::label('contract', 'Contract:') !!}
    {!! Form::text('contract', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Designation Field -->
<div class="form-group col-sm-3">
    {!! Form::label('designation', 'Designation:') !!}
    {!! Form::text('designation', null, ['class' => 'form-control', 'required', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Salary Model Field -->
<div class="form-group col-sm-3">
    {!! Form::label('salary_model', 'Salary Model:') !!}
    {!! Form::text('salary_model', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Rider Reference Field -->
<div class="form-group col-sm-3">
    {!! Form::label('rider_reference', 'Rider Reference:') !!}
    {!! Form::text('rider_reference', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
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
    {!! Form::text('insurance', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
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
<!-- Other Details Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('other_details', 'Other Details:') !!}
  {!! Form::textarea('other_details', null, ['class' => 'form-control', 'rows' => 2]) !!}
</div>
