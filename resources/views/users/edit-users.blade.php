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
  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">


@endsection
@include('partials.sidebar')
@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Add Users</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-light p-4 rounded shadow">
      @csrf
      @method('PUT')
  
      <div class="mb-3">
          <label class="form-label">First Name</label>
          <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control" placeholder="Enter your first name" required>
      </div>
  
      <div class="mb-3">
          <label class="form-label">Last Name</label>
          <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" placeholder="Enter your last name" required>
      </div>
  
      <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Enter your email" required>
      </div>
  
      <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" value="{{ old('password', $user->password) }}" class="form-control" placeholder="Enter your password" required>
      </div>
  
      <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" name="password_confirmation" value="{{ old('password_confirmation', $user->password_confirmation) }}" class="form-control" placeholder="Repeat Password" required>
      </div>
  
      <div class="mb-3">  
          <select name="role" class="form-control form-control-user" required>
              <option value="">Select Role</option>
              <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
              <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
          </select>
      </div>
  
      <button type="submit" class="btn btn-primary w-100">Update Users</button>
  </form>
  
</div>
@endsection
@section('footer')
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
      <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2021</span>
      </div>
  </div>
</footer>
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
      </div>
  </div>
</div>
@endsection
<!-- End of Footer -->

</div>

@section('logout')
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
              <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                  @csrf
                  @method('POST')
                  <button type="submit" class="btn btn-primary">Logout</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
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