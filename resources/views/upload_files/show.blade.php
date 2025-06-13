@extends('upload_files.view')

@section('page_content')
<div class="card p-4 shadow-sm">
  <div class="row">
    <div class="form-group col-md-6">
      <label>File Name:</label>
      <p>{{ $uploadFile->name }}</p>
    </div>
    <div class="form-group col-md-6">
      <label>Uploaded By:</label>
      <p>{{ $uploadFile->uploaded_by }}</p>
    </div>
    <div class="form-group col-md-6">
      <label>Uploaded At:</label>
      <p>{{ $uploadFile->created_at->format('d M Y, h:i A') }}</p>
    </div>
    <div class="form-group col-md-12">
      <label>Details:</label>
      <p>{{ $uploadFile->details }}</p>
    </div>
    <div class="form-group col-md-12">
      <label>File Preview:</label><br>
      <iframe src="{{ asset('storage/uploads/' . $uploadFile->file_path) }}" width="100%" height="400px"></iframe>
    </div>
  </div>
</div>
@endsection
