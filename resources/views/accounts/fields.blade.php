<script src="{{ asset('js/modal_custom.js') }}"></script>

<!-- Account Type Field -->
<div class="form-group col-sm-6">
  {!! Form::label('account_type', 'Account Type:') !!}
  {!! Form::select('account_type', Common::AccountTypes(),null, ['class' => 'form-control form-select select2']) !!}
</div>
<div class="form-group col-sm-6"></div>
<!-- Account Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Account Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>
<div class="form-group col-sm-6"></div>
<!-- Account Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_code', 'Account Code:') !!}
    {!! Form::text('account_code', null, ['class' => 'form-control', 'required', 'maxlength' => 20, 'maxlength' => 20]) !!}
</div>
<!-- Parent Account Id Field -->
<div class="form-group col-sm-8">
    {!! Form::label('parent_id', 'Parent Account:') !!}
    <select name="parent_id" class="form-control form-select">
      <option value="">Select</option>
      {!! Common::dropdown($parents,$accounts->parent_id??null) !!}
    </select>
    {{-- {!! Form::select('parent_account_id', $parents,null, ['class' => 'form-control form-select select2']) !!} --}}
</div>

<!-- Opening Balance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opening_balance', 'Opening Balance:') !!}
    {!! Form::number('opening_balance', null, ['class' => 'form-control','step'=>'any']) !!}
</div>
<div class="form-group col-sm-6"></div>
