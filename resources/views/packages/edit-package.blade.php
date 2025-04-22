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

  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
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

<div class="container mt-5">
  <h4 class="text-center mb-4">Buy Package</h4>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops!</strong> Please fix the following errors:
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('packages.update', $userPackage->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow p-4 rounded-lg" style="max-width: 600px; width: 100%; margin: 0 auto;">
    @csrf
    @method('PUT')

    {{-- Package Selection --}}
    <div class="mb-4">
      <label for="package_id" class="block text-lg font-semibold">Select Package</label>
      <select name="package_id" id="package_id" class="form-select mt-2" required>
        @foreach($packages as $package)
          <option value="{{ $package->id }}"
            data-duration-type="{{ $package->duration_type }}"
            data-duration-value="{{ $package->duration_value }}"
            {{ old('package_id', $userPackage->package_id) == $package->id ? 'selected' : '' }}>
            {{ $package->name }} - Rs. {{ $package->price }}
          </option>
        @endforeach
      </select>
      @error('package_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Payment Screenshot --}}
    <div class="mb-4">
      <label for="payment_screenshot" class="block text-lg font-semibold">Upload Payment Screenshot</label>
      <input type="file" name="payment_screenshot" id="payment_screenshot" class="form-control mt-2">
      @error('payment_screenshot') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Start Date --}}
    <div class="mb-4">
      <label for="start_date" class="block text-lg font-semibold">Start Date</label>
      <input type="date" name="start_date" id="start_date" class="form-control mt-2"
      value="{{ old('start_date', \Carbon\Carbon::parse($userPackage->start_date)->format('Y-m-d')) }}" readonly>
  

      @error('start_date') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- End Date --}}
    <div class="mb-4">
      <label for="end_date" class="block text-lg font-semibold">End Date</label>
      <input type="date" name="end_date" id="end_date" class="form-control mt-2"
      value="{{ old('end_date', \Carbon\Carbon::parse($userPackage->end_date)->format('Y-m-d')) }}" required>
  
      @error('end_date') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Payment Method --}}
    <div class="mb-4">
      <label for="payment_method" class="block text-lg font-semibold">Payment Method</label>
      <select name="payment_method" id="payment_method" class="form-select mt-2" required>
        <option value="jazz_cash" {{ old('payment_method', $userPackage->payment_method) == 'jazz_cash' ? 'selected' : '' }}>JazzCash</option>
        <option value="easy_paisa" {{ old('payment_method', $userPackage->payment_method) == 'easy_paisa' ? 'selected' : '' }}>EasyPaisa</option>
        <option value="hbl_mobile" {{ old('payment_method', $userPackage->payment_method) == 'hbl_mobile' ? 'selected' : '' }}>HBL Mobile</option>
      </select>
      @error('payment_method') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="text-center">
      <button class="btn btn-success w-full py-3 text-lg font-semibold" style="width: 100%; max-width: 300px;">Update</button>
    </div>
  </form>
</div>

<script>
  function calculateEndDate(startDate, durationType, durationValue) {
    let endDate = new Date(startDate);
    if (durationType === 'month') {
      endDate.setMonth(endDate.getMonth() + parseInt(durationValue));
    } else if (durationType === 'year') {
      endDate.setFullYear(endDate.getFullYear() + parseInt(durationValue));
    }
    return endDate.toISOString().split('T')[0];
  }

  function updateDatesBasedOnPackage() {
    const packageSelect = document.getElementById('package_id');
    const selectedOption = packageSelect.options[packageSelect.selectedIndex];

    const durationType = selectedOption.getAttribute('data-duration-type');
    const durationValue = selectedOption.getAttribute('data-duration-value');

    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');

    const today = new Date();
    const formattedToday = today.toISOString().split('T')[0];
    startDateInput.value = formattedToday;

    const calculatedEndDate = calculateEndDate(formattedToday, durationType, durationValue);
    endDateInput.value = calculatedEndDate;
  }

  document.getElementById('package_id').addEventListener('change', updateDatesBasedOnPackage);
  document.addEventListener('DOMContentLoaded', () => {
  const startDateInput = document.getElementById('start_date');
  const endDateInput = document.getElementById('end_date');
  if (!startDateInput.value || !endDateInput.value) {
    updateDatesBasedOnPackage();
  }
});

</script>

