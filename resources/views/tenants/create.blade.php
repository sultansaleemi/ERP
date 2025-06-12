@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <h1>Create Tenant</h1>
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
                    <form action="{{ route('tenants.store') }}" method="POST">
                        @csrf
                        @include('tenants.fields')
                        <button type="submit" class="btn btn-primary">Create Tenant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection