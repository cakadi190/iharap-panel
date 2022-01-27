@extends('layouts.app')

@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="{{ asset('css/crud.css') }}" />

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" defer></script>

<script defer>
  document.addEventListener('DOMContentLoaded',() => {
    let table = new DataTable('.table');
  });
</script>
@endsection

@section('content')
  <div id="page-header" class="mb-4">
    <h3 class="main-page-title">Borrower List</h3>
  </div>

  <section class="card">
    <div class="table-responsive">
      <table id="applicant" class="table table-striped">
        <thead>
          <tr>
            <th>Week</th>
            <th>Total Application</th>
            <th>Total Loan Applied</th>
            <th>Total Loan Approved</th>
            <th>Total Loan Rejected</th>
            <th>Total Loan Disbursed</th>
            <th>Total Bad Debt</th>
          </tr>
        </thead>
      </table>
    </div>
  </section>
@endsection
