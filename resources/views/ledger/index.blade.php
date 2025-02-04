@extends('layouts.app')

@section('title','Account Ledger')
@section('content')
<div class="container">
    <h2>Account Ledger</h2>

   {{--  <div class="row mb-3">
        <div class="col-md-3">
            <input type="date" id="start_date" class="form-control" placeholder="Start Date">
        </div>
        <div class="col-md-3">
            <input type="date" id="end_date" class="form-control" placeholder="End Date">
        </div>
        <div class="col-md-3">
            <button id="filter" class="btn btn-primary">Filter</button>
            <button id="reset" class="btn btn-secondary">Reset</button>
        </div>
    </div> --}}

    <div class="content">

      @include('flash::message')

      <div class="clearfix"></div>

      <div class="card">
    @push('third_party_stylesheets')
    @include('layouts.datatables_css')
@endpush

<div class="card-body px-4" style="overflow-x: auto !important;">
    {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped dataTable']) !!}
</div>

@push('third_party_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush
      </div>
    </div>
@endsection
