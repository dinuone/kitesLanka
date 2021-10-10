<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kites Lanka</title>
  <base href="{{ \URL::to('/') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  {{-- sweet alert 2 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css"> 
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @livewireStyles  
</head>
<body class="hold-transition sidebar-mini">
  <style>
    .main-header{margin-bottom: 10px;}
  </style>

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="dropdown-item" href="{{ route('admin.logout') }}"
        onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/img/about2.png') }}" alt="kitesLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kites Lanka</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link {{ (request()->is('@kt12admin/home*')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.student') }}" class="nav-link {{ (request()->is('@kt12admin/student*')) ? 'active' : ''}}">
                  <i class="nav-icon fa fa-user-plus"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.class') }}" class="nav-link {{ (request()->is('@kt12admin/class*')) ? 'active' : ''}}">
                    <i class="nav-icon fa fa-address-card"></i>
                  <p>Manage class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.payment') }}" class="nav-link {{ (request()->is('@kt12admin/payment*')) ? 'active' : ''}}">
                    <i class="nav-icon fa fa-credit-card"></i>
                  <p>Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.links') }}" class="nav-link {{ (request()->is('@kt12admin/links*')) ? 'active' : ''}}">
                  <i class="nav-icon fa fa-link"></i>
                  <p>Manage Links</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.announcement') }}" class="nav-link {{ (request()->is('@kt12admin/announcement*')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-bullhorn"></i>
                  <p>Announcement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.attendace') }}" class="nav-link {{ (request()->is('@kt12admin/attendance*')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-clipboard-check"></i>
                  <p>Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-line {{ (request()->is('@kt12admin/report*')) ? 'active' : ''}}"></i>
                  <p>Reports</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('content')
  </div>
    <!-- /.content-header -->

    <!-- Main content -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

@livewireScripts
</body>
</html>
