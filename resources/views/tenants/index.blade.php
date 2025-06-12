@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <h1>Tenants</h1>
        </div>
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('tenants.create') }}" class="btn btn-primary">Add New Tenant</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @include('tenants.table')
                </div>
            </div>
        </div>
    </div>
@endsection