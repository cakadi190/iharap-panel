<div class="sidebar-header mb-2">
  <a class="sidebar-title" href="{{ url('/') }}">
    <img src="{{ asset('images/logo-white.svg') }}" alt="{{ config('app.name', 'Laravel') }}" height="35px" />
    <div class="ms-3 h5 mb-0">{{ config('app.name', 'Laravel') }}</div>
  </a>
</div>

<div class="sidebar-content">
  <ul class="nav nav-pills flex-column">
    <li class="{{ Str::is('home*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item' }}">
      <a href="{{ route('home') }}" class="nav-link">
        <img src="{{ Str::is('home*', Route::currentRouteName()) ? asset('images/icon/dashboard-active.svg') : asset('images/icon/dashboard.svg') }}" class="nav-icon" />
        <span class="text">Dashboard</span>
      </a>
    </li>
    <li class="{{ Str::is('applicant*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item' }}">
      <a href="{{ route('applicant.index') }}" class="nav-link">
        <img src="{{ Str::is('applicant*', Route::currentRouteName()) ? asset('images/icon/applicant-active.svg') : asset('images/icon/applicant.svg') }}" class="nav-icon" />
        <span class="text">Applicant</span>
      </a>
    </li>
    <li class="{{ Str::is('borrower*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item' }}">
      <a href="{{ route('borrower.index') }}" class="nav-link">
        <img src="{{ Str::is('borrower*', Route::currentRouteName()) ? asset('images/icon/borrower-active.svg') : asset('images/icon/borrower.svg') }}" class="nav-icon" />
        <span class="text">Borrowers</span>
      </a>
    </li>
    <li class="{{ Str::is('collection*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item' }}">
      <a href="{{ route('collection.index') }}" class="nav-link">
        <img src="{{ Str::is('collection*', Route::currentRouteName()) ? asset('images/icon/collection-active.svg') : asset('images/icon/collection.svg') }}" class="nav-icon" />
        <span class="text">Collection Report</span>
      </a>
    </li>
    <li class="{{ Str::is('overdue*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item' }}">
      <a href="{{ route('overdue.index') }}" class="nav-link">
        <img src="{{ Str::is('overdue*', Route::currentRouteName()) ? asset('images/icon/overdue-active.svg') : asset('images/icon/overdue.svg') }}" class="nav-icon" />
        <span class="text">Overdue Installment</span>
      </a>
    </li>
    <li class="{{ Str::is('userrole*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item' }}">
      <a href="{{ route('user-roles.index') }}" class="nav-link">
        <img src="{{ Str::is('userrole*', Route::currentRouteName()) ? asset('images/icon/userrole-active.svg') : asset('images/icon/userrole.svg') }}" class="nav-icon" />
        <span class="text">User Role</span>
      </a>
    </li>
    <li class="{{ Str::is('sales*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item' }}">
      <a href="{{ route('sales.index') }}" class="nav-link">
        <img src="{{ Str::is('sales*', Route::currentRouteName()) ? asset('images/icon/sales-active.svg') : asset('images/icon/sales.svg') }}" class="nav-icon" />
        <span class="text">Sales</span>
      </a>
    </li>
    <li class="{{ Str::is('late-change*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item' }}">
      <a href="{{ route('late-changes.index') }}" class="nav-link">
        <img src="{{ Str::is('late-change*', Route::currentRouteName()) ? asset('images/icon/late-change-active.svg') : asset('images/icon/late-change.svg') }}" class="nav-icon" />
        <span class="text">Late Charges</span>
      </a>
    </li>
  </ul>
</div>
