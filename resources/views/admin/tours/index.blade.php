@extends('layouts.admin')

@section('title', 'Manage Tours')

@section('breadcrumb')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Manage Tours</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Manage Tours</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title mb-0">Tour List</h3>
      <a href="{{ route('admin.tours.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Add New Tour
      </a>

    </div>
  </div>

  <div class="card-body table-responsive p-0">
    <table id="toursTable" class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tour Name</th>
          <th>Location</th>
          <th>Duration</th>
          <th>Price</th>
          <th>Status</th>
          <th style="width: 160px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Boracay Getaway</td>
          <td>Boracay, Aklan</td>
          <td>3 Days / 2 Nights</td>
          <td>₱5,500</td>
          <td><span class="badge badge-success">Active</span></td>
          <td>
            <a href="#" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Palawan Adventure</td>
          <td>El Nido, Palawan</td>
          <td>4 Days / 3 Nights</td>
          <td>₱8,200</td>
          <td><span class="badge badge-secondary">Inactive</span></td>
          <td>
            <a href="#" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('#toursTable').DataTable({
      responsive: true,
      autoWidth: false,
      pageLength: 5
    });
  });
</script>

@endsection