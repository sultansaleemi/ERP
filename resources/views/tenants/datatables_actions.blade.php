<a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-info btn-sm">View</a>
<a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
</form>