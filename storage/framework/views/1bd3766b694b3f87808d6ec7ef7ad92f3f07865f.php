<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/emandate.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3>Fill E-Mandate</h3>

<div class="card card-body p-4">
  <div class="row">
    <div class="col-md-7">

      <form action="<?php echo e(route('emandate.process')); ?>" method="post" id="emandate-form">
        <?php echo csrf_field(); ?>

        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" name="fullname" class="form-control" value="<?php echo e($loan->fullname); ?>" readonly placeholder="Enter your full name" />
        </div>

        <div class="form-group">
          <label for="nric">National Identity Number</label>
          <input type="text" id="nric" name="nric" class="form-control" value="<?php echo e($loan->nric); ?>" readonly placeholder="Enter your National Identity Number" />
        </div>

        <div class="form-group">
          <label for="bank">Phone Number</label>
          <div class="input-group">
            <select name="prefix" id="prefix" class="form-control w-25">
              <option disabled="disabled">Choose One</option>
              <option value="+65">+65 Singapore</option>
              <option value="+62">+62 Indonesia</option>
              <option value="+63">+63 Philipines</option>
              <option value="+64">+64 Malaysia</option>
            </select>
            <input type="text" class="form-control w-75" placeholder="Your phone number" name="phone"/>
          </div>
        </div>

        <div class="form-group">
          <label for="id_type">Identity Number Type</label>
          <select name="id_type" class="form-control" id="id_type">
            <option disabled selected>Choose One</option>
            <option value="1"> New NRIC Number </option>
            <option value="2"> Old NRIC Number </option>
            <option value="3"> Passport Number </option>
            <option value="4"> Bussiness Registration </option>
            <option value="5"> Others </option>
          </select>
        </div>

        <div class="form-group">
          <label for="bank">Bank for Repayment</label>
          <input type="hidden" name="bank" id="bank"/>
          <button type="button" onclick="loadData('<?php echo e(route('emandate.bank')); ?>')" class="form-control text-start" data-bs-toggle="modal" data-bs-target="#bankList">Select bank</button>
        </div>

        <div class="form-group">
          <label for="bank_no">Bank Number</label>
          <input type="text" class="form-control" name="bank_no" id="bank_no" readonly placeholder="Select bank first to open this form" />
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" name="email" id="email" value="<?php echo e($loan->email); ?>" readonly placeholder="Enter your email" />
        </div>

        <input type="hidden" name="total_repayment_period" value="<?php echo e($loan->period * 12); ?>" />
        <input type="hidden" name="mandate_frequency" value="<?php echo e($loan->period); ?>" />
        <input type="hidden" name="subs_id" value="<?php echo e($loan->subs_id); ?>" />
        <input type="hidden" name="purpose" value="<?php echo e($loan->purpose); ?>" />
        <input type="hidden" name="subscription_id" value="<?php echo e($loan->subs_id); ?>" />
        <input type="hidden" name="mandate_freq" value="Monthly" />
        <input type="hidden" name="id" value="<?php echo e($loan->id_loan); ?>" />
        <input type="hidden" name="repayment_amount" value="<?php echo e(number_format((float) round( (($loan->amount * 0.05 * $loan->period) + $loan->amount) / ($loan->period * 12), 2 ))); ?>" />

      </form>

      <!-- Modal Bank List -->
      <div class="modal fade" id="bankList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="bankListLabel">Bank Selection</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="selection-wrapper"></div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="button" onclick="selection()" class="btn btn-primary">Select</button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="col-md-5">

      <div class="card table-responsive">
        <div class="card-body">Payment Summary</div>
        <table class="table border-top table-striped table-borderless mb-0">
          <tbody>
            <tr>
              <th>Subscription ID</th>
              <td><?php echo e($loan->subs_id); ?></td>
            </tr>
            <tr>
              <th>Total Repayment Period</th>
              <td><?php echo e($loan->period); ?> year(s)</td>
            </tr>
            <tr>
              <th>Repayment Amount</th>
              <td>RM<?php echo e(number_format((float) round( (($loan->amount * 0.05 * $loan->period) + $loan->amount) / ($loan->period * 12), 2 ))); ?></td>
            </tr>
            <tr>
              <th>Mandate Frequency</th>
              <td>Monthly</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="d-grid">
        <button type="submit" onclick="document.querySelector('#emandate-form').submit()" class="btn-primary btn mt-3 btn-block" data-trigger="submit">Submit Now</button>
      </div>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  function selection() {
    let data = $('.selection-wrapper input:checked');
    let val  = data.val();
    let name = data.data('name');

    $('[data-bs-toggle="modal"]').html(name);
    $('input#bank').val(val);

    $('.selection-wrapper').html('');
    $('input#bank_no').prop('readonly', false);
    $('input#bank_no').prop('placeholder', 'Enter your bank number');

    $('#bankList').modal('hide');
  }

  function loadData(url) {
    $.ajax({
      url: url,
      type: 'POST',

      success(res) {
        let html = '';
        res.forEach(function(a) {
          html += `<div class="wrapping">
            <input type="radio" value="${a.bank_id}" data-name="${a.bank_name}" name="bank_select" id="bank-${a.bank_id}" />
            <label class="checking" for="bank-${a.bank_id}">
              <img src="${a.image}" />
              <div id="content">
                <h3>${a.bank_name}</h3>
                <p>${a.status}</p>
              </div>
            </label>
          </div>`;
        });

        $('.selection-wrapper').html(html);
      }
    })
  };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/iharap.dasa.web.id/resources/views/emandate.blade.php ENDPATH**/ ?>