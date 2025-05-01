@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcrumb')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Dashboard</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
  </div>
@endsection

@section('content')
<div class="row">
  <!-- Summary Cards -->
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>120</h3>
        <p>Total Tours</p>
      </div>
      <div class="icon">
        <i class="fas fa-map-marked-alt"></i>
      </div>
      <a href="{{ url('/admin/tours') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>85</h3>
        <p>Active Bookings</p>
      </div>
      <div class="icon">
        <i class="fas fa-calendar-check"></i>
      </div>
      <a href="{{ url('/admin/bookings') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>48</h3>
        <p>Customers Today</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>12</h3>
        <p>Pending Requests</p>
      </div>
      <div class="icon">
        <i class="fas fa-clock"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<!-- Row for Chart and Table -->
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tour Bookings Overview</h3>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="bookingChart" style="height:300px; width:100%"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Quick Stats</h3>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Today's Revenue</b> <span class="float-right text-success">₱15,250</span>
          </li>
          <li class="list-group-item">
            <b>Available Vehicles</b> <span class="float-right">12</span>
          </li>
          <li class="list-group-item">
            <b>Hotels Booked</b> <span class="float-right">23</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Recent Bookings Table -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Recent Bookings</h3>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Booking ID</th>
          <th>Customer</th>
          <th>Tour</th>
          <th>Status</th>
          <th>Booking Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>#T-1001</td>
          <td>Maria Santos</td>
          <td>Boracay Getaway</td>
          <td><span class="badge badge-success">Confirmed</span></td>
          <td>2025-04-28</td>
        </tr>
        <tr>
          <td>#T-1002</td>
          <td>Juan Dela Cruz</td>
          <td>Palawan Adventure</td>
          <td><span class="badge badge-warning">Pending</span></td>
          <td>2025-04-29</td>
        </tr>
        <tr>
          <td>#T-1003</td>
          <td>Ana Reyes</td>
          <td>Baguio Weekend</td>
          <td><span class="badge badge-danger">Cancelled</span></td>
          <td>2025-04-30</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('bookingChart').getContext('2d');
  const bookingChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Bookings',
        data: [12, 19, 3, 5, 8, 13, 7],
        borderColor: '#007bff',
        backgroundColor: 'rgba(0, 123, 255, 0.1)',
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endpush
