@extends('layouts.home')

@section('header')
<style>
  h3.title {
    font-weight: 600;
    font-size: 2rem;
    color: #81007F;
    margin: 1rem 0;
  }

  .btn-submit {
    padding: .5rem 1rem !important;
    font-size: 1rem !important;
  }

  .heading-primary, .heading-secondary {
    font-weight: 600;
  }

  .heading-primary {
    font-size: 3rem;
  }

  .heading-secondary {
    font-size: 1.5rem;
  }

  #text-footer {
    font-size: 1.15rem;
    font-weight: 600;
  }
</style>
@endsection

@section('content')
<h3 class="title" style="color:#81007F">Loan Application</h3>

<div class="row justify-content-center my-5 pt-5" style="color:#81007F">
  <div class="col-md-6">
    <div class="card shadow">

      <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between w-100">
          <div class="left">
            <p class="m-0">Loan Account Number</p>
            <h3 class="account-num heading-secondary">{{ $loan->id_loan }}</h3>
          </div>
          <img src="https://iharap.tri-niche.com/wp-content/uploads/chip.png" alt="Chip" height="50px" class="right ml-auto" />
        </div>

        <div class="d-flex align-items-center justify-content-between mt-5">
          <p class="m-0">Outstanding this month <strong>Jan 2020</strong> :</p>
          <h3 class="h1 m-0 heading-primary">RM{{ number_format($loan->amount) }}</h3>
        </div>
      </div>

      <hr class="m-0">

      <div class="card-body p-4">
        <form action="" method="POST" class="d-flex justify-content-end">
          <button class="btn btn-submit">Make Payment</button>
        </form>
      </div>

    </div>

    <p class="m-3 text-center" id="text-footer">For any late repayment, late payment fees & finance charges will be applied.</p>
  </div>
</div>
@endsection
