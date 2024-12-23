@extends('layouts.app')

@section('title','Customers')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Customers</h3>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary action-btn show-modal"
                    href="javascript:void(0);" data-size="lg" data-title="New Customer" data-action="{{ route('customers.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('customers.table')
        </div>
    </div>

@endsection
