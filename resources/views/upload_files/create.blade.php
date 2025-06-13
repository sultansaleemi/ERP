@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('upload_files.store') }}" enctype="multipart/form-data">
        @csrf
        @include('upload_files.fields')
        <button type="submit" class="btn btn-success">Upload File</button>
    </form>
</div>
@endsection
