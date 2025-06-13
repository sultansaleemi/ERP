@extends('upload_files.view')

@section('page_content')
<div class="card p-4 shadow-sm">
  <div class="row">
    <div class="form-group col-md-6">
      <label>File Name:</label>
      <p>{{ $file->name }}</p>
    </div>
    <div class="form-group col-md-6">
      <label>Uploaded By:</label>
      <p>{{ $file->uploaded_by }}</p>
    </div>
    <div class="form-group col-md-6">
      <label>Uploaded At:</label>
      <p>{{ $file->created_at->format('d M Y, h:i A') }}</p>
    </div>
    <div class="form-group col-md-12">
      <label>Details:</label>
      <p>{{ $file->details }}</p>
    </div>
    <div class="form-group col-md-12">
      <label>File Preview:</label><br>
      <img src="{{ asset('storage/' . $file->path) }}" alt="File" width="50%" height="90%">
    </div>
  </div>
</div>
@endsection
