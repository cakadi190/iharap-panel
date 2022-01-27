@extends('layouts.home')

@section('header')
<meta http-equiv="refresh" content="5; url=https://iharap.tri-niche.com/pay-now/" />
@endsection

@section('content')
<h3 class="title" style="color:#81007F">Loan Application</h3>

<div class="row justify-content-center my-5 pt-5" style="color:#81007F">
  <div class="col-md-6">
    <div class="card shadow p-4">

      <h3 class="text-center">Ups Sorry!</h3>
      <p class="text-center m-0">The loan ID <strong>{{ request()->get('id') }}</strong> are not found. We will return back again to the main website for re-check the loan.</p>

    </div>
  </div>
</div>
@endsection
