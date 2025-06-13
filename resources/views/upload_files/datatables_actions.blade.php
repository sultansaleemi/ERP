<a href="{{ route('upload_files.show', $id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('upload_files.edit', $id) }}" class="btn btn-sm btn-primary">Edit</a>
<form action="{{ route('upload_files.destroy', $id) }}" method="POST" style="display:inline-block">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this file?')">Delete</button>
</form>
