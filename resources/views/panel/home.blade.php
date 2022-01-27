@extends('layouts.app')

@section('content')
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
@endsection
