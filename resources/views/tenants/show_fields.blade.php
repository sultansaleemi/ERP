<div class="form-group">
    <strong>Name:</strong> {{ $tenant->name }}
</div>
<div class="form-group">
    <strong>Subdomain:</strong> {{ $tenant->subdomain }}
</div>
<div class="form-group">
    <strong>Database Name:</strong> {{ $tenant->database_name }}
</div>
<div class="form-group">
    <strong>Database User:</strong> {{ $tenant->database_user }}
</div>
<div class="form-group">
    <strong>Database Password:</strong> {{ str_repeat('*', strlen($tenant->database_password)) }}
</div>