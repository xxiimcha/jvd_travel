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
        <input type="hidden" name="external_tour_id" id="external_tour_id">
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

      <!-- Tour Schedules -->
      <div class="form-group mt-4">
        <h5 class="mb-3">Tour Schedules</h5>
        <div id="scheduleContainer">
          <div class="schedule-row row mb-3">
            <div class="col-md-4">
              <input type="date" name="schedules[0][start_date]" class="form-control" required>
            </div>
            <div class="col-md-4">
              <input type="date" name="schedules[0][end_date]" class="form-control" required>
            </div>
            <div class="col-md-3">
              <input type="number" name="schedules[0][max_participants]" class="form-control" placeholder="Max Participants">
            </div>
            <div class="col-md-1">
              <button type="button" class="btn btn-danger btn-sm" onclick="removeSchedule(this)"><i class="fas fa-trash"></i></button>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-secondary btn-sm" onclick="addSchedule()">+ Add Schedule</button>
      </div>

      <button type="submit" class="btn btn-success mt-4">Create Tour</button>
    </form>
  </div>
</div>

<script>
let scheduleIndex = 1;

function addSchedule() {
  const container = document.getElementById('scheduleContainer');
  const row = document.createElement('div');
  row.classList.add('schedule-row', 'row', 'mb-3');

  row.innerHTML = `
    <div class="col-md-4">
      <input type="date" name="schedules[${scheduleIndex}][start_date]" class="form-control" required>
    </div>
    <div class="col-md-4">
      <input type="date" name="schedules[${scheduleIndex}][end_date]" class="form-control" required>
    </div>
    <div class="col-md-3">
      <input type="number" name="schedules[${scheduleIndex}][max_participants]" class="form-control" placeholder="Max Participants">
    </div>
    <div class="col-md-1">
      <button type="button" class="btn btn-danger btn-sm" onclick="removeSchedule(this)">
        <i class="fas fa-trash"></i>
      </button>
    </div>
  `;
  container.appendChild(row);
  scheduleIndex++;
}

function removeSchedule(button) {
  const row = button.closest('.schedule-row');
  row.remove();
}

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
    document.getElementById('external_tour_id').value = selected.value;
    document.getElementById('location').value = selected.dataset.location;
    document.getElementById('price').value = selected.dataset.price;
    document.getElementById('duration').value = `${selected.dataset.days} Days / ${selected.dataset.nights} Nights`;
  }
}

document.addEventListener('DOMContentLoaded', loadAvailableTours);
</script>
@endsection
