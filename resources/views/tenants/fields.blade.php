@php
    $tenant = isset($tenant) ? $tenant : null;
@endphp

<div class="form-group">
    <label for="name">Tenant Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $tenant->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="subdomain">Subdomain</label>
    <input type="text" name="subdomain" class="form-control" value="{{ old('subdomain', $tenant->subdomain ?? '') }}" placeholder="e.g., client1" required>
</div>
<div class="form-group">
    <label for="database_name">Database Name</label>
    <input type="text" name="database_name" class="form-control" value="{{ old('database_name', $tenant->database_name ?? '') }}" placeholder="e.g., cpaneluser_tenant_client1" required>
</div>
<div class="form-group">
    <label for="database_user">Database User</label>
    <input type="text" name="database_user" class="form-control" value="{{ old('database_user', $tenant->database_user ?? '') }}" placeholder="e.g., cpaneluser_tenant_client1_user" required>
</div>
<div class="form-group">
    <label for="database_password">Database Password</label>
    <input type="password" name="database_password" class="form-control" value="{{ old('database_password', $tenant->database_password ?? '') }}" required>
</div>