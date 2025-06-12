@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <h1>View Tenant</h1>
        </div>
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @include('tenants.show_fields')
                        </div>
                    </div>
                    <a href="{{ route('tenants.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection