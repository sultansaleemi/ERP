<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Subdomain</th>
            <th>Database</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tenants as $tenant)
            <tr>
                <td>{{ $tenant->name }}</td>
                <td>{{ $tenant->subdomain }}</td>
                <td>{{ $tenant->database_name }}</td>
                <td>
                    @include('tenants.datatable_actions', ['tenant' => $tenant])
                </td>
            </tr>
        @endforeach
    </tbody>
</table>