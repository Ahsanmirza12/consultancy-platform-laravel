@extends('layouts.app')

@section('header')
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Consultancy - Dashboard</title>
  <style>
    .swal2-popup.colored-toast {
        background-color: #4ade80; /* Green */
        color: white;
        font-weight: bold;
        font-family: 'Segoe UI', sans-serif;
    }
</style>


  <!-- Fonts and styles -->
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
  <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- ADD THIS LINE -->

<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const packageSelect = document.getElementById('package_id');
  const startDateInput = document.getElementById('start_date');
  const endDateInput = document.getElementById('end_date');
  const paymentInput = document.getElementById('payment_screenshot');
  const imagePreview = document.getElementById('image_preview');

  // Function to add months
  function addMonths(date, months) {
    const newDate = new Date(date);
    newDate.setMonth(newDate.getMonth() + months);
    return newDate;
  }

  function setDates() {
    const selectedOption = packageSelect.options[packageSelect.selectedIndex];
    const durationMonths = parseInt(selectedOption.getAttribute('data-duration'));

    const today = new Date();
    const startDate = today.toISOString().split('T')[0];

    const endDate = addMonths(today, durationMonths);
    const formattedEndDate = endDate.toISOString().split('T')[0];

    startDateInput.value = startDate;
    endDateInput.value = formattedEndDate;
  }

  // Preview selected image
  paymentInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
      }
      reader.readAsDataURL(file);
    } else {
      imagePreview.src = '';
      imagePreview.style.display = 'none';
    }
  });

  // Set initial and updated dates
  setDates();
  packageSelect.addEventListener('change', setDates);
});
</script>
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast'
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        });
    </script>
@endif

@endsection

@section('content')
<div class="container mt-5">
  <h4 class="text-center mb-4">Buy Package</h4>
  <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow p-4 rounded-lg" style="max-width: 600px; margin: auto;">
    @csrf

    <div class="mb-4">
      <label for="package_id" class="block text-lg font-semibold">Select Package</label>
      <select name="package_id" id="package_id" class="form-select mt-2" required>
        @foreach($packages as $package)
          <option value="{{ $package->id }}" data-duration="{{ $package->duration_months }}">
            {{ $package->name }} - Rs. {{ $package->price }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-4">
      <label for="payment_screenshot" class="block text-lg font-semibold">Upload Payment Screenshot</label>
      <input type="file" name="payment_screenshot" id="payment_screenshot" class="form-control mt-2" accept="image/*" required>
      <img id="image_preview" alt="Payment Preview" class="mt-3 rounded border" style="display:none; max-width: 100%; height: auto;" />
    </div>

    <div class="mb-4">
      <label for="start_date" class="block text-lg font-semibold">Start Date</label>
      <input type="date" name="start_date" id="start_date" class="form-control mt-2" required >
    </div>

    <div class="mb-4">
      <label for="end_date" class="block text-lg font-semibold">End Date</label>
      <input type="date" name="end_date" id="end_date" class="form-control mt-2" required>
    </div>

    <div class="mb-4">
      <label for="payment_method" class="block text-lg font-semibold">Payment Method</label>
      <select name="payment_method" id="payment_method" class="form-select mt-2" required>
        <option value="jazz_cash">JazzCash</option>
        <option value="easy_paisa">EasyPaisa</option>
        <option value="hbl_mobile">HBL Mobile</option>
      </select>
    </div>

    <div class="text-center">
      <button class="btn btn-success w-full py-3 text-lg font-semibold" style="max-width: 300px;">Submit</button>
    </div>
  </form>
</div>
@endsection
