@extends('layouts.app')

@section('title','RTA Fines')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>RTA Fines</h3>
                </div>
                <div class="col-sm-6">
                    @can('rta_fines_create')
                        <a class="btn btn-primary float-right show-modal action-btn"
                           href="javascript:void(0);" 
                           data-action="{{ route('rta-fines.create') }}" 
                           data-title="Add New Fine" 
                           data-size="lg">
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
            @include('rta_fines.table')
        </div>
    </div>
@endsection
