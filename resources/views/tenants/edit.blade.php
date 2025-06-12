@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <h1>Edit Tenant</h1>
        </div>
        <div class="content">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('tenants.update', $tenant->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('tenants.fields', ['tenant' => $tenant])
                        <button type="submit" class="btn btn-primary">Update Tenant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection