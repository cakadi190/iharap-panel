<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo e(empty($title) ? config('app.name', 'Laravel') : $title); ?></title>

  <!-- Scripts -->
  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" />

  <?php echo $__env->yieldContent('header'); ?>
</head>

<body>
  <div id="app">

    <main class="py-3 py-xl-0" id="main-wrapper">
      <div class="container">
        <div class="row align-items-center justify-content-center min-vh-100">
          <div class="col-sm-9">

            <div class="d-flex justify-content-center mb-4">
              <a href="<?php echo e(route('login')); ?>">
                <img src="<?php echo e(asset('images/logo-purple.svg')); ?>" alt="<?php echo e(config('app.name')); ?>" class="shadow rounded-circle" height="100px" />
              </a>
            </div>

            <div class="card shadow border-0">
              <div class="row">
                <div class="col-lg-6 align-self-strech img-panel" style="background: url('<?php echo e(asset('images/bg-login.jpg')); ?>')"></div>
                <div class="col-lg-6">

                  <div class="p-4">
                    <?php echo $__env->yieldContent('content'); ?>
                  </div>

                </div>
              </div>
            </div>

            <div class="mt-4 text-center">
              <p class="m-0 copyright">© 2021 All rights reserved. <a href="<?php echo e(route('login')); ?>">i-Harap</a></p>
            </div>

          </div>
        </div>
      </div>
    </main>

  </div>

  <script src="<?php echo e(asset('js/app.js')); ?>"></script>
  <?php echo $__env->yieldContent('footer'); ?>

</body>
</html>
<?php /**PATH /www/wwwroot/iharap.dasa.web.id/resources/views/layouts/login.blade.php ENDPATH**/ ?>