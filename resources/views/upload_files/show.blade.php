@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $file->name }}</h3>
    <p><strong>Details:</strong> {{ $file->detail }}</p>
    <p><strong>Uploaded By:</strong> {{ $file->uploader->name }}</p>
    <p><strong>Uploaded At:</strong> {{ $file->uploaded_at }}</p>
    <div>
        <iframe src="{{ Storage::url($file->path) }}" style="width:100%; height:600px;"></iframe>
    </div>
</div>
@endsection
