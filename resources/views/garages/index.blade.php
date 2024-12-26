@extends('layouts.app')

@section('title','garages')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Garages</h3>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary action-btn show-modal"
                    href="javascript:void(0);" data-size="md" data-title="New" data-action="{{ route('garages.create') }}">
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
            @include('garages.table')
        </div>
    </div>

@endsection
