<?php $__env->startSection('content'); ?>
  <div id="page-header" class="mb-4">
    <h3 class="main-page-title">Dashboard</h3>
  </div>

  <section class="card card-body">

    <div class="row mb-3">
      <div class="col-md-5">
        <div class="card card-body bg-dim-secondary border-0">
          <h3 class="widget-title">Loan Summary</h3>
        </div>
      </div>
      <div class="col-md-7">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-body bg-dim-danger border-0"></div>
          </div>
          <div class="col-md-6">
            <div class="card card-body bg-dim-secondary border-0"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-body bg-dim-primary border-0">
      <h3 class="widget-title">Data Loan and Applicant(s) Summary</h3>
    </div>

  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/iharap.dasa.web.id/resources/views/panel/home.blade.php ENDPATH**/ ?>