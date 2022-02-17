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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    {{-- sweet alert 2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    @livewireStyles

</head>

<body class="hold-transition sidebar-mini">
    <style>
        .main-header {
            margin-bottom: 10px;
        }

    </style>

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="dropdown-item bg-maroon" href="{{ route('admin-logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mr-2"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" class="d-none">
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
                <img src="{{ asset('assets/img/about2.png') }}" alt="kitesLogo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Kites Lanka</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('admin-home') }}"
                                class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-student') }}"
                                class="nav-link {{ request()->is('admin/student*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-user-plus"></i>
                                <p>Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-teacher-details') }}"
                                class="nav-link {{ request()->is('admin/add-teachers*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-class') }}"
                                class="nav-link {{ request()->is('admin/class*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-address-card"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/payment/*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-credit-card"></i>
                                <p>Payments</p>
                            </a>
                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item">
                                    <a href="{{ route('admin-addPayment') }}"
                                        class="nav-link {{ request()->is('admin/payment/add-payment*') ? 'active' : '' }}">
                                        <i class="fas fa-plus mr-2"></i>
                                        <p>Add payments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('receive-payment') }}"
                                        class="nav-link {{ request()->is('admin/payment/receive-payment') ? 'active' : '' }}">
                                        <i class="fas fa-plus mr-2"></i>
                                        <p>Receive Payments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('view-summary') }}"
                                        class="nav-link {{ request()->is('admin/payment-summary') ? 'active' : '' }}">
                                        <i class="fas fa-plus mr-2"></i>
                                        <p>payment Summary</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-links') }}"
                                class="nav-link {{ request()->is('admin/links*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-link"></i>
                                <p>Manage Links</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-announcement') }}"
                                class="nav-link {{ request()->is('admin/announcement*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-bullhorn"></i>
                                <p>Announcement</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-attendance') }}"
                                class="nav-link {{ request()->is('admin/attendance*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-check"></i>
                                <p>Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('materials') }}"
                                class="nav-link {{ request()->is('admin/course-material*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Course Materials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-reports') }}"
                                class="nav-link {{ request()->is('admin/reports*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Reports</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('stud-feedbacks') }}"
                                class="nav-link {{ request()->is('admin/feedback*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-smile"></i>
                                <p>Students Feedback</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-showAcc-Setting') }}"
                                class="nav-link {{ request()->is('admin/account-setting*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>Account Settings</p>
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
    </div>
    <!-- Main content -->

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    @livewireScripts

    @yield('scripts')




</body>

</html>
