@extends('layouts.app')
@section('title', 'Vendors')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vendor Details</h1>
                </div>
                
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Vendor Name:</label>
                            <p>{{ $vendor->name }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Contact Number:</label>
                            <p>{{ $vendor->contact_number }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email:</label>
                            <p>{{ $vendor->email }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address:</label>
                            <p>{{ $vendor->address }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Vendor Type:</label>
                            <p>{{ $vendor->vendor_type }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('vendors.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection