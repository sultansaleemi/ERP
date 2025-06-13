@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('upload_files.create') }}" class="btn btn-primary mb-3">Upload New File</a>
    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
</div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
