<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="<?php echo e(asset('css/crud.css')); ?>" />

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

<style>
  #detail-loan button {
    padding: .25rem 1.35rem;
  }
</style>

<script defer>
  function changeDate(date) {
    return moment(date).format('MMMM Do YYYY')
  }

  function storage(num) {
    if(num >= 1000 || num <= 999999) {
      return (num / 1000) + "MB";
    } else if (num >= 1000000 || num <= 999999999) {
      return (num / 1000000) + "GB";
    } else {
      return num + "KB";
    }
  }

  function currency(data) {
    var num = +data;
    return num.toLocaleString('my-MY', {
      style: 'currency',
      currency: 'MYR',
    });
  }

  function loanApply(num) {
    Swal.fire({
      'title' : 'Do you want to apply this loan?',
      'html' : 'Please recheck the data before do this action.',
      'showCancelButton' : true,
      'icon': 'warning',
      'confirmButtonText' : 'Apply',
    }).then(apply => {
      if(apply.isConfirmed) {
        $.ajax({
          url: "<?php echo e(route('applicant.apply')); ?>",
          type: 'POST',
          data: {id: num},

          beforeSend() {
            Swal.fire({
              title: 'Please wait',
              allowOutsideClick: false,
              text: 'System will be process your request.',
              didOpen() {
                Swal.showLoading();
              }
            });
          },

          success(result) {
            Swal.fire('Success!', 'The loan successfuly applied.', 'success');
            // window.location.reload();
          },

          error(err) {
            let res = err.response;
            Swal.fire('Failed!', 'System have broken for temporary, the reason is:' + res.message, 'error');
          }
        });
      }

      Swal.close();
    });
  }

  async function loanReject(num) {
    const {value: reason} = await Swal.fire({
      icon: 'warning',
      input: 'textarea',
      showCancelButton: true,
      cancelButtonText: 'Cancel',
      confirmButtonText: 'Reject This Loan',
      html: 'Are you sure to reject this loan? Enter the rejection reason first to continue.',
      inputLabel: 'Reason',
      inputPlaceholder: 'Enter the reason for rejection'
    });

    if(reason) {
      let data = {
        reason: reason,
        id: num,
      };
      $.ajax({
        url: "<?php echo e(route('applicant.reject')); ?>",
        type: 'POST',
        data: data,

        beforeSend() {
          Swal.fire({
            title: 'Please wait',
            allowOutsideClick: false,
            text: 'System will be process your request.',
            didOpen() {
              Swal.showLoading();
            }
          });
        },

        success(result) {
          Swal.fire('Success!', 'The loan successfuly rejected.', 'success');
          window.location.reload();
        },

        error(err) {
          let res = err.response;
          Swal.fire('Failed!', 'System have broken for temporary, the reason is:' + res.message, 'error');
        }
      });
    }
  }

  document.addEventListener('DOMContentLoaded',() => {
    let table = $('.table').dataTable({
      ajax: '<?php echo e(route('borrower.api')); ?>',
      lengthMenu: [30, 50, 100, 150, 200, 300, 400, 500, 1000],
      columnDefs: [{
        "defaultContent": "-",
        "targets": "_all"
      }],
      columns: [
        // First column
        {data: 'id_loan'},
        {data: 'fullname'},
        {
          data: 'amount',
          render: function( data, type, full, meta ) {
            return currency(data);
          }
        },
        {
          data: 'status',
          render: function( data, type, full, meta ) {
            if(data == 'pending')
            {
              return "<span class=\"badge bg-warning text-dark\">Pending Verification</span>";
            } else if (data == 'applied')
            {
              return "<span class=\"badge bg-success\">Success</span>";
            } else if(data == 'reject')
            {
              return "<span class=\"badge bg-danger\">Rejected</span>";
            } else {
              return "<span class=\"badge bg-light text-dark\">Unknown</span>";
            }
          }
        },
        {
          data: 'loan_id',
          render: function( data, type, full, meta ) {
            return `
            <!-- Modal -->
            <div class="modal fade" id="modalDetail-${full.id_loan}" tabindex="-1" aria-labelledby="modalDetail-${full.id_loan}Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title" id="modalDetail-${full.id_loan}Label">Loan Details of "${full.id_loan}"</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table border table-striped rounded">
                        <tbody>
                          <tr>
                            <td class="w-50">NRIC</td>
                            <td class="w-50">${full.nric}</td>
                          </tr>
                          <tr>
                            <td class="w-50">Full Name</td>
                            <td class="w-50">${full.fullname}</td>
                          </tr>
                          <tr>
                            <td class="w-50">Email</td>
                            <td class="w-50">${full.email}</td>
                          </tr>
                          <tr>
                            <td class="w-50">Phone Number</td>
                            <td class="w-50">${full.phone}</td>
                          </tr>
                          <tr>
                            <td class="w-50">Birthday</td>
                            <td class="w-50">${ changeDate(full.birthday) }</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <h3 class="mt-3 h4 text-primary">Requirement Information</h3>
                    <div class="table-responsive">
                      <table class="table border table-striped rounded">
                        <tbody>
                          <tr>
                            <td class="w-50">Dependants</td>
                            <td class="w-50">${ full.dependants_child }</td>
                          </tr>
                          <tr>
                            <td class="w-50">Employment Status</td>
                            <td class="w-50">${ full.employment_stat }</td>
                          </tr>
                          <tr>
                            <td class="w-50">Finance Amount</td>
                            <td class="w-50">${ currency(full.amount) }</td>
                          </tr>
                          <tr>
                            <td class="w-50">Period</td>
                            <td class="w-50">${ full.period } year(s) (${ full.period * 12 }) month(s)</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <h3 class="h4 mt-3 mb-3 text-primary border-bottom">Downloadable Files</h3>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <div class="row">
                          <div class="col-4">
                            <img src="<?php echo e(asset('images/files.svg')); ?>" width="40px" />
                          </div>
                          <div class="col-8">
                            <a class="text-decoration-none" href="<?php echo e(route('download')); ?>?file=/uploads/${full.ic_front.name}.${full.ic_front.ext}">
                              <h6 class="font-weight-bold">Identity Card (Front)</h6>
                              <p class="m-0 text-muted">${storage(full.ic_front.size)}</p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="row">
                          <div class="col-4">
                            <img src="<?php echo e(asset('images/files.svg')); ?>" width="40px" />
                          </div>
                          <div class="col-8">
                            <a class="text-decoration-none" href="<?php echo e(route('download')); ?>?file=/uploads/${full.ic_back.name}.${full.ic_back.ext}">
                              <h6 class="font-weight-bold">Identity Card (Back)</h6>
                              <p class="m-0 text-muted">${storage(full.ic_back.size)}</p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="row">
                          <div class="col-4">
                            <img src="<?php echo e(asset('images/files.svg')); ?>" width="40px" />
                          </div>
                          <div class="col-8">
                            <a class="text-decoration-none" href="<?php echo e(route('download')); ?>?file=/uploads/${full.salary.name}.${full.salary.ext}">
                              <h6 class="font-weight-bold">Salary Slip</h6>
                              <p class="m-0 text-muted">${storage(full.salary.size)}</p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="row">
                          <div class="col-4">
                            <img src="<?php echo e(asset('images/files.svg')); ?>" width="40px" />
                          </div>
                          <div class="col-8">
                            <a class="text-decoration-none" href="<?php echo e(route('download')); ?>?file=/uploads/${full.salary_slip.name}.${full.salary_slip.ext}">
                              <h6 class="font-weight-bold">Salary Public Lifeline</h6>
                              <p class="m-0 text-muted">${storage(full.salary_slip.size)}</p>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex flex-nowrap" id="detail-loan">
                <button class="btn btn-outline-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#modalDetail-${full.id_loan}">Details</button>
                <div class="dropdown ms-2">
                  <button class="btn btn-primary btn-sm dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">More</button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="${ full.status == 'applied' ? 'dropdown-item disabled' : 'dropdown-item' }" href="javascript:void(0)" onclick="loanApply('${full.id_loan}')"><i class="fa-solid fa-check fa-fw"></i>Approve</a></li>
                    <li><a class="${ full.status == 'reject' ? 'dropdown-item disabled' : 'dropdown-item' }" href="javascript:void(0)" onclick="loanReject('${full.id_loan}')"><i class="fa-solid fa-times fa-fw"></i>Reject</a></li>
                  </ul>
                </div>
            </div>`;
          }
        }
      ],
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div id="page-header" class="mb-4">
    <h3 class="main-page-title">Applicant</h3>
  </div>

  <section class="card">
    <div class="table-responsive">
      <table id="applicant" class="table table-striped">
        <thead>
          <tr>
            <th>Loan ID</th>
            <th>Name</th>
            <th>Finance Amount</th>
            <th>Status</th>
            <th width="100px">&nbsp;</th>
          </tr>
        </thead>
      </table>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/iharap.dasa.web.id/resources/views/panel/applicant.blade.php ENDPATH**/ ?>