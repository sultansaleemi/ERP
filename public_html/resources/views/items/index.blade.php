@extends('layouts.app')

@section('title','Items')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Items</h3>
                </div>
                <div class="col-sm-6">
                  @can('item_create')
                    <a class="btn btn-primary action-btn show-modal"
                    href="javascript:void(0);" data-size="md" data-title="New Item" data-action="{{ route('items.create') }}">
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
            @include('items.table')
        </div>
    </div>

@endsection
