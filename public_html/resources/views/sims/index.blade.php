@extends('layouts.app')

@section('title','Sims')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Sims</h3>
                </div>
                <div class="col-sm-6">
                  @can('sim_create')
                    <a class="btn btn-primary action-btn show-modal"
                    href="javascript:void(0);" data-size="lg" data-title="New Sim" data-action="{{ route('sims.create') }}">
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
            @include('sims.table')
        </div>
    </div>

@endsection
