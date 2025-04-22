@yield('header')
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
@yield('sidebar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
       @yield('content')
       
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    @yield('logout')
    <!-- Bootstrap core JavaScript-->
  @yield('script')

