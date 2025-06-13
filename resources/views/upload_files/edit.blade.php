@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('upload_files.update', $file->id) }}">
        @csrf
        @method('PUT')
        @include('upload_files.fields')
        <button type="submit" class="btn btn-primary">Update Details</button>
    </form>
</div>
@endsection
