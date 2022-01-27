<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo e(empty($title) ? config('app.name', 'Laravel') : $title); ?></title>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" defer></script>
  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
  <script src="<?php echo e(asset('js/panel.js')); ?>" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

  <!-- Styles -->
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('css/panel.css')); ?>" rel="stylesheet" />

  <link href="<?php echo e(asset('vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet" />

  <?php echo $__env->yieldContent('header'); ?>
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand navbar-dark fixed-top" id="panel-navbar">
      <div class="container">
        <a class="navbar-brand d-sm-flex d-xs-none d-none me-3 align-items-center" href="<?php echo e(url('/')); ?>">
          <img src="<?php echo e(asset('images/logo-white.svg')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>" height="40px" />
          <div class="ms-3"><?php echo e(config('app.name', 'Laravel')); ?></div>
        </a>
        <button class="btn-toggler btn">
          <span class="fa-solid fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto align-items-center">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto align-items-center">
            <!-- Authentication Links -->
            <?php if(auth()->guard()->guest()): ?>
              <?php if(Route::has('login')): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
              </li>
              <?php endif; ?>

              <?php if(Route::has('register')): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
              </li>
              <?php endif; ?>
            <?php else: ?>

            <li class="nav-item dropdown no-caret me-2">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="28" height="20" viewBox="0 0 22 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.9997 26.334C12.4663 26.334 13.6663 25.134 13.6663 23.6673H8.33301C8.33301 25.134 9.53301 26.334 10.9997 26.334ZM18.9997 18.334V11.6673C18.9997 7.57398 16.8263 4.14732 12.9997 3.24065V2.33398C12.9997 1.22732 12.1063 0.333984 10.9997 0.333984C9.89301 0.333984 8.99967 1.22732 8.99967 2.33398V3.24065C5.18634 4.14732 2.99967 7.56065 2.99967 11.6673V18.334L0.333008 21.0007V22.334H21.6663V21.0007L18.9997 18.334ZM16.333 19.6673H5.66634V11.6673C5.66634 8.36065 7.67967 5.66732 10.9997 5.66732C14.3197 5.66732 16.333 8.36065 16.333 11.6673V19.6673Z" fill="white"/>
                </svg>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown no-caret me-3">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="28" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.987 0.666016C6.62699 0.666016 0.666992 6.63935 0.666992 13.9993C0.666992 21.3593 6.62699 27.3327 13.987 27.3327C21.3603 27.3327 27.3337 21.3593 27.3337 13.9993C27.3337 6.63935 21.3603 0.666016 13.987 0.666016ZM23.227 8.66602H19.2937C18.867 6.99935 18.2537 5.39935 17.4537 3.91935C19.907 4.75935 21.947 6.46602 23.227 8.66602ZM14.0003 3.38602C15.107 4.98602 15.9737 6.75935 16.547 8.66602H11.4537C12.027 6.75935 12.8937 4.98602 14.0003 3.38602ZM3.68033 16.666C3.46699 15.8127 3.33366 14.9193 3.33366 13.9993C3.33366 13.0793 3.46699 12.186 3.68033 11.3327H8.18699C8.08033 12.2127 8.00033 13.0927 8.00033 13.9993C8.00033 14.906 8.08033 15.786 8.18699 16.666H3.68033ZM4.77366 19.3327H8.70699C9.13366 20.9993 9.74699 22.5993 10.547 24.0793C8.09366 23.2393 6.05366 21.546 4.77366 19.3327V19.3327ZM8.70699 8.66602H4.77366C6.05366 6.45268 8.09366 4.75935 10.547 3.91935C9.74699 5.39935 9.13366 6.99935 8.70699 8.66602V8.66602ZM14.0003 24.6127C12.8937 23.0127 12.027 21.2393 11.4537 19.3327H16.547C15.9737 21.2393 15.107 23.0127 14.0003 24.6127ZM17.1203 16.666H10.8803C10.7603 15.786 10.667 14.906 10.667 13.9993C10.667 13.0927 10.7603 12.1993 10.8803 11.3327H17.1203C17.2403 12.1993 17.3337 13.0927 17.3337 13.9993C17.3337 14.906 17.2403 15.786 17.1203 16.666ZM17.4537 24.0793C18.2537 22.5993 18.867 20.9993 19.2937 19.3327H23.227C21.947 21.5327 19.907 23.2393 17.4537 24.0793V24.0793ZM19.8137 16.666C19.9203 15.786 20.0003 14.906 20.0003 13.9993C20.0003 13.0927 19.9203 12.2127 19.8137 11.3327H24.3203C24.5337 12.186 24.667 13.0793 24.667 13.9993C24.667 14.9193 24.5337 15.8127 24.3203 16.666H19.8137Z" fill="white"/>
                </svg>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>

            <li class="nav-item me-4">
              <div class="switcher-wrapper">
                <div class="switch">
                  <input id="light" checked type="radio" name="switcher"/>
                  <label for="light"> <i class="fa-solid fa-sun"></i></label>
                </div>
                <div class="switch">
                  <input id="dark" type="radio" name="switcher"/>
                  <label for="dark"> <i class="fa-solid fa-moon"></i></label>
                </div>
              </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
              <a id="user-dropdown" class="nav-link dropdown-toggle" href="javascript:void()" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <?php if(Auth::user()->profile_img): ?>
                <img src="<?php echo e(Auth::user()->profile_img); ?>" alt="<?php echo e(Auth::user()->fullname); ?>" />
                <?php else: ?>
                <img src="<?php echo e(asset('images/default.png')); ?>" alt="<?php echo e(Auth::user()->fullname); ?>" />
                <?php endif; ?>

                <div class="userinfo">
                  <div class="user-name"><?php echo e(Auth::user()->fullname); ?></div>
                  <div class="badge badge-default"><?php echo e(Str::ucfirst(Auth::user()->getRoleNames()[0])); ?></div>
                </div>
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="user-dropdown">
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"><?php echo e(__('My Profile')); ?></a>

                <a class="dropdown-item" href="javascript:void()" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                  <?php echo csrf_field(); ?>
                </form>
              </div>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <aside class="overlay"></aside>
    <aside class="sidebar-navbar"><?php echo $__env->make('layouts.panel.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></aside>

    <main class="py-4">
      <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </main>
  </div>

  <?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
<?php /**PATH /www/wwwroot/iharap.dasa.web.id/resources/views/layouts/app.blade.php ENDPATH**/ ?>