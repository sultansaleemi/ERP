<div class="form-group">
    <label>File Name</label>
    <input type="text" class="form-control" value="{{ old('name', $file->name ?? '') }}" disabled>
</div>

@if(!isset($file))
<div class="form-group">
    <label>Select File</label>
    <input type="file" name="file" class="form-control" required>
</div>
@endif

<div class="form-group">
    <label>Details</label>
    <textarea name="detail" class="form-control">{{ old('detail', $file->detail ?? '') }}</textarea>
</div>

@if(isset($file))
<div class="form-group">
    <label>Uploaded At:</label>
    <p>{{ $file->uploaded_at }}</p>
</div>
@endif
