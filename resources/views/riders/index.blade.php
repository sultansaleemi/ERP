@extends('layouts.app')

@section('title','Riders')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Riders</h3>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary action-btn show-modal"
                       href="{{ route('riders.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="card">
            @include('riders.table')
        </div>
    </div>

@endsection
