<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="text-center">
  <h3 class="login-title"><?php echo e(__('Restricted Area')); ?></h3>
  <p><?php echo e(__('Please enter your account information to authenticate for processing data.')); ?></p>
</div>

<form method="POST" action="<?php echo e(route('login')); ?>">
  <?php echo csrf_field(); ?>

  <div class="form-group mb-3">
    <label for="email" class="col-form-label text-md-right"><?php echo e(__('Your Email')); ?></label>
    <input id="email" type="email" placeholder="<?php echo e(__('Enter your email')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span class="invalid-feedback" role="alert">
      <strong><?php echo e($message); ?></strong>
    </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>

  <div class="form-group form-password">
    <label for="password" class="col-form-label text-md-right"><?php echo e(__('Password')); ?></label>
    <input id="password" type="password" placeholder="<?php echo e(__('Enter your password')); ?>" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
    <button class="btn btn-link" type="button"><i id="icon" class="fa-solid fa-eye"></i></button>

    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span class="invalid-feedback" role="alert">
      <strong><?php echo e($message); ?></strong>
    </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>

  <div class="d-flex justify-content-between my-3">

    <div class="form-group">
      <div class="custom-control form-check custom-checkbox">
        <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> value="true" />
        <label class="form-check-label" for="remember"><?php echo e(__('Remember Me')); ?></label>
      </div>
    </div>

    <div class="text-end text-xl-start">
      <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Password?')); ?></a>
    </div>

  </div>

  <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" class="btn btn-block btn-primary fw-bold px-4 py-2"><?php echo e(__('Log Me In')); ?></button>
  </div>

  <?php if(Route::has('register')): ?>
  <div class="text-center mt-3">
    <a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
  </div>
  <?php endif; ?>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src="<?php echo e(asset('js/login.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/iharap.dasa.web.id/resources/views/auth/login.blade.php ENDPATH**/ ?>