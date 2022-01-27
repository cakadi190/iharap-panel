@extends('layouts.app')

@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="{{ asset('css/crud.css') }}" />

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" defer></script>

<script>
  document.addEventListener('DOMContentLoaded',() => {
    $('.table').dataTable({
      ajax: {
        url: '{{ route("collection.api") }}'
      }
    });
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
            <th>Loan ID</th>
            <th>Name</th>
            <th>Payment Method</th>
            <th>Payment Sequence</th>
            <th>Total Loan</th>
            <th>Officer</th>
            <th>Status</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
      </table>
    </div>
  </section>
@endsection
