<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Contact Person Field -->
<div class="form-group col-sm-12">
    {!! Form::label('contact_person', 'Contact Person:') !!}
    {!! Form::text('contact_person', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Contact Number Field -->
<div class="form-group col-sm-12">
  {!! Form::label('contact_number', 'Contact Number:') !!}
  {!! Form::text('contact_number', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>


<!-- Detail Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detail', 'Detail:') !!}
    {!! Form::textarea('detail', null, ['class' => 'form-control', 'maxlength' => 65535, 'rows' => 3]) !!}
</div>


