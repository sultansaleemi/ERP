<!-- need to remove -->
<li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
    <a href="{{ route('home') }}" class="menu-link ">
      <i class="menu-icon tf-icons ti ti-layout-dashboard"></i>
      <div>Dashboard</div>
     {{--  <div class="badge bg-white text-dark rounded-pill ms-auto">2</div>  --}}
    </a>
  </li>

  <li class="menu-item {{ Request::is('items*') ? 'active' : '' }}">
    <a href="{{ route('items.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-notes"></i>
        <div>Items</div>
    </a>
</li>

<li class="menu-item {{ Request::is('customers*') ? 'active' : '' }}">
  <a href="{{ route('customers.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-user-star"></i>
      <div>Customers</div>
  </a>
</li>
<li class="menu-item {{ Request::is('riders*') ? 'active' : '' }}">
  <a href="{{ route('riders.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-user-pin"></i>
      <div>Riders</div>
  </a>
</li>
<li class="menu-item {{ Request::is('bikes*') ? 'active' : '' }}">
  <a href="{{ route('bikes.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-motorbike"></i>
      <div>Bikes</div>
  </a>
</li>

<li class="menu-item {{ Request::is('sims*') ? 'active' : '' }}">
  <a href="{{ route('sims.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-device-sim"></i>
      <div>Sims</div>
  </a>
</li>

<li class="menu-item {{ Request::is('leasingCompanies*') ? 'active' : '' }}">
  <a href="{{ route('leasingCompanies.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-building"></i>
      <div>Leasing Companies</div>
  </a>
</li>
<li class="menu-item {{ Request::is('garages*') ? 'active' : '' }}">
  <a href="{{ route('garages.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-building"></i>
      <div>Garages</div>
  </a>
</li>




 <li class="menu-item {{ Request::is('accounts*') ? 'open' : '' }} {">
  <a href="javascript:void(0);" class="menu-link menu-toggle ">
    <i class="menu-icon tf-icons ti ti-graph"></i>
    <div data-i18n="Front Pages">Accounts</div>
  </a>
  <ul class="menu-sub">

      <li class="menu-item {{ Request::is('accounts/accounts') ? 'active' : '' }}">
        <a href="{{ route('accounts.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div>Chart Of Accounts</div>
        </a>
      </li>


  </ul>
</li>


  @can('user_view')
  <li class="menu-item {{ Request::is('users*') ? 'open' : '' }} {{ Request::is('roles*') ? 'open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle ">
      <i class="menu-icon tf-icons ti ti-users-group"></i>
      <div data-i18n="Front Pages">User Management</div>
    </a>
    <ul class="menu-sub">

  <li class="menu-item {{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}" class="menu-link ">
        <i class="menu-icon tf-icons ti ti-users-group"></i>
        Users
    </a>
    </li>


    @can('role_view')
    <li class="menu-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}" class="menu-link ">
        <i class="menu-icon tf-icons ti ti-user-check"></i>
        Roles
    </a>
    </li>


    <li class="menu-item {{ Request::is('permissions*') ? 'active' : '' }}">
      <a href="{{ route('permissions.index') }}" class="menu-link ">
          <i class="menu-icon tf-icons ti ti-user-check"></i>
          Permissions
      </a>
      </li>
      @endcan
  </ul>
</li>
@endcan


<li class="menu-item {{ Request::is('settings*') ? 'open' : '' }} {">
  <a href="javascript:void(0);" class="menu-link menu-toggle ">
    <i class="menu-icon tf-icons ti ti-settings"></i>
    <div data-i18n="Front Pages">Company Settings</div>
  </a>
  <ul class="menu-sub">

      <li class="menu-item {{ Request::is('settings/company') ? 'active' : '' }}">
        <a href="{{ route('settings') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div>Settings</div>
        </a>
      </li>

      <li class="menu-item {{ Request::is('settings/departments') ? 'active' : '' }}">
        <a href="{{ route('departments.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div>Departments</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('settings/banks') ? 'active' : '' }}">
        <a href="{{ route('banks.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div>Banks</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('settings/dropdowns') ? 'active' : '' }}">
        <a href="{{ route('dropdowns.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-list"></i>
            <div>Dropdowns</div>
        </a>
      </li>

  </ul>
</li>


