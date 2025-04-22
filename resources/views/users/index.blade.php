@extends('users.app')
@section('header')
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  

  <title>Consultancy - Dashboard</title>
  <style>
    
    #search-results {
        margin-top: 35px;  /* Adds a 5px top margin to the results container */
    }

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
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" id="search-form">
            <div class="input-group">
                <input type="text" id="search-input" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="search-btn">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        
        <div id="search-results"></div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                      aria-labelledby="searchDropdown">
                      <form class="form-inline mr-auto w-100 navbar-search">
                          <div class="input-group">
                              <input type="text" class="form-control bg-light border-0 small"
                                  placeholder="Search for..." aria-label="Search"
                                  aria-describedby="basic-addon2">
                              <div class="input-group-append">
                                  <button class="btn btn-primary" type="button">
                                      <i class="fas fa-search fa-sm"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </li>

              <!-- Nav Item - Alerts -->
              <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bell fa-fw"></i>
                      <!-- Counter - Alerts -->
                      <span class="badge badge-danger badge-counter">3+</span>
                  </a>
                  <!-- Dropdown - Alerts -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                      aria-labelledby="alertsDropdown">
                      <h6 class="dropdown-header">
                          Alerts Center
                      </h6>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                          <div class="mr-3">
                              <div class="icon-circle bg-primary">
                                  <i class="fas fa-file-alt text-white"></i>
                              </div>
                          </div>
                          <div>
                              <div class="small text-gray-500">December 12, 2019</div>
                              <span class="font-weight-bold">A new monthly report is ready to download!</span>
                          </div>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                          <div class="mr-3">
                              <div class="icon-circle bg-success">
                                  <i class="fas fa-donate text-white"></i>
                              </div>
                          </div>
                          <div>
                              <div class="small text-gray-500">December 7, 2019</div>
                              $290.29 has been deposited into your account!
                          </div>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                          <div class="mr-3">
                              <div class="icon-circle bg-warning">
                                  <i class="fas fa-exclamation-triangle text-white"></i>
                              </div>
                          </div>
                          <div>
                              <div class="small text-gray-500">December 2, 2019</div>
                              Spending Alert: We've noticed unusually high spending for your account.
                          </div>
                      </a>
                      <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                  </div>
              </li>

              <!-- Nav Item - Messages -->
              <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-envelope fa-fw"></i>
                      <!-- Counter - Messages -->
                      <span class="badge badge-danger badge-counter">7</span>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                      aria-labelledby="messagesDropdown">
                      <h6 class="dropdown-header">
                          Message Center
                      </h6>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                              <img class="rounded-circle" src="{{ asset('assets/img/undraw_profile_1.svg') }}"
                                  alt="...">
                              <div class="status-indicator bg-success"></div>
                          </div>
                          <div class="font-weight-bold">
                              <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                  problem I've been having.</div>
                              <div class="small text-gray-500">Emily Fowler · 58m</div>
                          </div>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                              <img class="rounded-circle" src="{{ asset('assets/img/undraw_profile_2.svg') }}"
                                  alt="...">
                              <div class="status-indicator"></div>
                          </div>
                          <div>
                              <div class="text-truncate">I have the photos that you ordered last month, how
                                  would you like them sent to you?</div>
                              <div class="small text-gray-500">Jae Chun · 1d</div>
                          </div>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                              <img class="rounded-circle" src="{{ asset('assets/img/undraw_profile_3.svg') }}"
                                  alt="...">
                              <div class="status-indicator bg-warning"></div>
                          </div>
                          <div>
                              <div class="text-truncate">Last month's report looks great, I am very happy with
                                  the progress so far, keep up the good work!</div>
                              <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                          </div>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                              <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                  alt="...">
                              <div class="status-indicator bg-success"></div>
                          </div>
                          <div>
                              <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                  told me that people say this to all dogs, even if they aren't good...</div>
                              <div class="small text-gray-500">Chicken the Dog · 2w</div>
                          </div>
                      </a>
                      <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                  </div>
              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </span>
                      <img class="img-profile rounded-circle"
                          src="{{ asset('assets/img/undraw_profile.svg') }}">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                      aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="#">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Profile
                      </a>
                      <a class="dropdown-item" href="#">
                          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                          Settings
                      </a>
                      <a class="dropdown-item" href="#">
                          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                          Activity Log
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                      </a>
                  </div>
              </li>

          </ul>

      </nav>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <div class="container mt-5">
            <h2>Users List</h2>  
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ url('/users/create') }}" class="btn btn-primary">
                    Add User
                </a>
            </div>  
            <table class="table table-bordered table-striped">
              <thead class="table-dark">
                  <tr>
                      <th>#</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Registered</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $index => $user)
                  <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ ucfirst($user->role) }}</td>
                      <td>{{ $user->created_at->diffForHumans() }}</td>
                      <td>
                        <a href="{{ route('users.edit-users', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                          <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        
            {{-- Pagination Links --}}
            <div class="container mt-4">
                <!-- Displaying the active packages -->
            
            
                <!-- Custom Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if ($users->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                    Previous
                                </a>
                            </li>
                        @endif
            
                        <!-- Page Numbers -->
                        @foreach(range(1, $users->lastPage()) as $i)
                            <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endforeach
            
                        <!-- Next Page Link -->
                        @if ($users->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                                    Next
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        
        

          

      </div>
      <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
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
<!-- End of Content Wrapper -->
@endsection
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
<script>
    document.getElementById('search-btn').addEventListener('click', function() { // Corrected id
        var query = document.getElementById('search-input').value;

        if (query.length > 0) {
            fetch('/search?query=' + query)
                .then(response => response.json())
                .then(data => {
                    var resultContainer = document.getElementById('search-results');
                    if (data.length > 0) {
                        var html = '<ul>';
                        data.forEach(item => {
                            // Display the correct field depending on the type of model
                            if (item.source === 'User') {
                                html += `<li>${item.first_name}</li>`;  // Assuming user_name is a field in Package model
                                html += `<li>${item.last_name}</li>`;
                                html += `<li>${item.email}</li>`;
                                html += `<li>${item.role}</li>`;
                            } 
                        });
                        html += '</ul>';
                        resultContainer.innerHTML = html;
                    } else {
                        resultContainer.innerHTML = '<p>Not found</p>';
                    }
                })
                .catch(error => console.log(error));
        }
    });
</script>



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