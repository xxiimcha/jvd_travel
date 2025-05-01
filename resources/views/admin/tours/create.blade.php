@extends('layouts.admin')

@section('title', 'Create Tour')

@section('breadcrumb')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Create New Tour</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/admin/tours') }}">Manage Tours</a></li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ url('/admin/tours/store') }}" method="POST">
      @csrf

      <!-- Predefined Tours Dropdown -->
      <div class="form-group">
        <label for="predefinedTour">Choose Predefined Tour</label>
        <select class="form-control" id="predefinedTour" onchange="fillTourDetails()">
          <option value="">-- Select Tour --</option>
        </select>
      </div>

      <!-- Location -->
      <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" id="location" class="form-control" required>
      </div>

      <!-- Duration -->
      <div class="form-group">
        <label for="duration">Duration</label>
        <input type="text" name="duration" id="duration" class="form-control" required>
      </div>

      <!-- Price -->
      <div class="form-group">
        <label for="price">Price (₱)</label>
        <input type="number" name="price" id="price" class="form-control" required>
      </div>

      <!-- Status -->
      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success">Create Tour</button>
    </form>
  </div>
</div>

<script>
  async function loadAvailableTours() {
    try {
      const response = await fetch('https://core2.easetravelandtours.com/api/fetch-tour');
      const result = await response.json();

      if (result.success) {
        const select = document.getElementById('predefinedTour');
        result.data.forEach(tour => {
          const option = document.createElement('option');
          option.value = tour.id;
          option.textContent = `${tour.location} - ₱${tour.price} (${tour.duration_days}D/${tour.duration_nights}N)`;
          option.dataset.price = tour.price;
          option.dataset.days = tour.duration_days;
          option.dataset.nights = tour.duration_nights;
          option.dataset.location = tour.location;
          select.appendChild(option);
        });
      }
    } catch (error) {
      console.error('Error loading tours:', error);
    }
  }

  function fillTourDetails() {
    const selected = document.getElementById('predefinedTour').selectedOptions[0];
    if (selected) {
      document.getElementById('location').value = selected.dataset.location;
      document.getElementById('price').value = selected.dataset.price;
      document.getElementById('duration').value = `${selected.dataset.days} Days / ${selected.dataset.nights} Nights`;
    }
  }

  document.addEventListener('DOMContentLoaded', loadAvailableTours);
</script>
@endsection
