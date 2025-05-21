@extends('layouts.app')

@section('title','Banks')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Banks</h3>
                </div>
                <div class="col-sm-6">
                  @can('bank_create')
                    <a class="btn btn-primary float-right show-modal action-btn"
                       href="javascript:void(0);" data-action="{{ route('banks.create') }}" data-title="Add New" data-size="lg">
                        Add New
                    </a>
                    @endcan
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('banks.table')
        </div>
    </div>

@endsection
