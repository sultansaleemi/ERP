<!-- Inv Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inv_date', 'Inv Date:') !!}
    {!! Form::text('inv_date', null, ['class' => 'form-control','id'=>'inv_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#inv_date').datepicker()
    </script>
@endpush

<!-- Rider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rider_id', 'Rider Id:') !!}
    {!! Form::number('rider_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    {!! Form::number('vendor_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Zone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zone', 'Zone:') !!}
    {!! Form::text('zone', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Login Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('login_hours', 'Login Hours:') !!}
    {!! Form::number('login_hours', null, ['class' => 'form-control']) !!}
</div>

<!-- Working Days Field -->
<div class="form-group col-sm-6">
    {!! Form::label('working_days', 'Working Days:') !!}
    {!! Form::number('working_days', null, ['class' => 'form-control']) !!}
</div>

<!-- Perfect Attendance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perfect_attendance', 'Perfect Attendance:') !!}
    {!! Form::number('perfect_attendance', null, ['class' => 'form-control']) !!}
</div>

<!-- Rejection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rejection', 'Rejection:') !!}
    {!! Form::number('rejection', null, ['class' => 'form-control']) !!}
</div>

<!-- Performance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('performance', 'Performance:') !!}
    {!! Form::text('performance', null, ['class' => 'form-control', 'maxlength' => 20, 'maxlength' => 20]) !!}
</div>

<!-- Off Field -->
<div class="form-group col-sm-6">
    {!! Form::label('off', 'Off:') !!}
    {!! Form::text('off', null, ['class' => 'form-control', 'maxlength' => 20, 'maxlength' => 20]) !!}
</div>

<!-- Month Invoice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('month_invoice', 'Month Invoice:') !!}
    {!! Form::number('month_invoice', null, ['class' => 'form-control']) !!}
</div>

<!-- Descriptions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descriptions', 'Descriptions:') !!}
    {!! Form::textarea('descriptions', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Total Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_amount', 'Total Amount:') !!}
    {!! Form::number('total_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Billing Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_month', 'Billing Month:') !!}
    {!! Form::text('billing_month', null, ['class' => 'form-control','id'=>'billing_month']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#billing_month').datepicker()
    </script>
@endpush

<!-- Gaurantee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gaurantee', 'Gaurantee:') !!}
    {!! Form::text('gaurantee', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::text('notes', null, ['class' => 'form-control', 'maxlength' => 500, 'maxlength' => 500]) !!}
</div>