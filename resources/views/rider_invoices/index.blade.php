@extends('layouts.app')

@section('title','Rider Invoices')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Rider Invoices</h3>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success action-btn show-modal"
                       href="javascript:void(0);" data-size="sm" data-title="Import Rider Invoices" data-action="{{ route('rider.invoice_import') }}" >
                        Import Invoices
                    </a>

                    <a class="btn btn-primary action-btn show-modal"
                       href="javascript:void(0);" data-size="xl" data-title="Create Rider Invoice" data-action="{{ route('riderInvoices.create') }}" >
                        Create Invoice
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('rider_invoices.table')
        </div>
    </div>

@endsection
