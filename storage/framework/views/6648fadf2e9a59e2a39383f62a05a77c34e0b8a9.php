<div class="sidebar-header mb-2">
  <a class="sidebar-title" href="<?php echo e(url('/')); ?>">
    <img src="<?php echo e(asset('images/logo-white.svg')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>" height="35px" />
    <div class="ms-3 h5 mb-0"><?php echo e(config('app.name', 'Laravel')); ?></div>
  </a>
</div>

<div class="sidebar-content">
  <ul class="nav nav-pills flex-column">
    <li class="<?php echo e(Str::is('home*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item'); ?>">
      <a href="<?php echo e(route('home')); ?>" class="nav-link">
        <img src="<?php echo e(Str::is('home*', Route::currentRouteName()) ? asset('images/icon/dashboard-active.svg') : asset('images/icon/dashboard.svg')); ?>" class="nav-icon" />
        <span class="text">Dashboard</span>
      </a>
    </li>
    <li class="<?php echo e(Str::is('applicant*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item'); ?>">
      <a href="<?php echo e(route('applicant.index')); ?>" class="nav-link">
        <img src="<?php echo e(Str::is('applicant*', Route::currentRouteName()) ? asset('images/icon/applicant-active.svg') : asset('images/icon/applicant.svg')); ?>" class="nav-icon" />
        <span class="text">Applicant</span>
      </a>
    </li>
    <li class="<?php echo e(Str::is('borrower*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item'); ?>">
      <a href="<?php echo e(route('borrower.index')); ?>" class="nav-link">
        <img src="<?php echo e(Str::is('borrower*', Route::currentRouteName()) ? asset('images/icon/borrower-active.svg') : asset('images/icon/borrower.svg')); ?>" class="nav-icon" />
        <span class="text">Borrowers</span>
      </a>
    </li>
    <li class="<?php echo e(Str::is('collection*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item'); ?>">
      <a href="<?php echo e(route('collection.index')); ?>" class="nav-link">
        <img src="<?php echo e(Str::is('collection*', Route::currentRouteName()) ? asset('images/icon/collection-active.svg') : asset('images/icon/collection.svg')); ?>" class="nav-icon" />
        <span class="text">Collection Report</span>
      </a>
    </li>
    <li class="<?php echo e(Str::is('overdue*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item'); ?>">
      <a href="<?php echo e(route('overdue.index')); ?>" class="nav-link">
        <img src="<?php echo e(Str::is('overdue*', Route::currentRouteName()) ? asset('images/icon/overdue-active.svg') : asset('images/icon/overdue.svg')); ?>" class="nav-icon" />
        <span class="text">Overdue Installment</span>
      </a>
    </li>
    <li class="<?php echo e(Str::is('userrole*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item'); ?>">
      <a href="<?php echo e(route('user-roles.index')); ?>" class="nav-link">
        <img src="<?php echo e(Str::is('userrole*', Route::currentRouteName()) ? asset('images/icon/userrole-active.svg') : asset('images/icon/userrole.svg')); ?>" class="nav-icon" />
        <span class="text">User Role</span>
      </a>
    </li>
    <li class="<?php echo e(Str::is('sales*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item'); ?>">
      <a href="<?php echo e(route('sales.index')); ?>" class="nav-link">
        <img src="<?php echo e(Str::is('sales*', Route::currentRouteName()) ? asset('images/icon/sales-active.svg') : asset('images/icon/sales.svg')); ?>" class="nav-icon" />
        <span class="text">Sales</span>
      </a>
    </li>
    <li class="<?php echo e(Str::is('late-change*', Route::currentRouteName()) ? 'nav-item active' : 'nav-item'); ?>">
      <a href="<?php echo e(route('late-changes.index')); ?>" class="nav-link">
        <img src="<?php echo e(Str::is('late-change*', Route::currentRouteName()) ? asset('images/icon/late-change-active.svg') : asset('images/icon/late-change.svg')); ?>" class="nav-icon" />
        <span class="text">Late Charges</span>
      </a>
    </li>
  </ul>
</div>
<?php /**PATH /www/wwwroot/iharap.dasa.web.id/resources/views/layouts/panel/sidebar.blade.php ENDPATH**/ ?>