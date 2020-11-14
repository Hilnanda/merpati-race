<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="{{ asset('image/favicon.ico') }}">

    @stack('admin-top-style')
    @include('admin.includes-admin.style')
    @stack('admin-top-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css') }}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>P</b>T</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Pigeon</b>Time</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> --}}
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs">Admin Pigeon Time</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('image/user.png') }}" class="img-circle" alt="User Image">
                                    
                                    <p>
                                        Admin Pigeon Time
                                        <small></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                {{-- <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li> --}}
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    {{-- <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div> --}}
                                    <div class="pull-right">
                                        <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->

                <!-- search form -->

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ (request()->is('admin/index*')) ? 'active' : '' }}">
                        <a href="{{ route('admin-dashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                           
                        </a>
                        <!-- <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
                    </li>
                    <li class="header">APP</li>
                    <li class="{{ (request()->is('admin/list-club*')) ? 'active' : '' }}">
                        <a href="{{ route('list-club') }}">
                            <i class="fa fa-star"></i> <span>Club Pigeon</span>
                        </a>
                        <!-- <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
                    </li>
                    <li class="{{ (request()->is('admin/list-event*')) ? 'active' : '' }}">
                        <a href="{{ route('list-event') }}">
                            <i class="fa fa-superpowers"></i> <span>Lomba Umum</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/list-event*')) ? 'active' : '' }}">
                        <a href="{{ route('list-event') }}">
                            <i class="fa fa-twitter"></i> <span>Pigeon</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/user*')) ? 'active' : '' }}">
                        <a href="{{ route('list-user') }}">
                            <i class="fa fa-user"></i> <span>User</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/list-team*')) ? 'active' : '' }}">
                        <a href="{{ route('list-team') }}">
                            <i class="fa fa-users"></i> <span>Team</span>
                        </a>
                    </li>
                    <li class="header">One Loft Race</li>
                    <li class="{{ (request()->is('admin/list-loft*')) ? 'active' : '' }}">
                        <a href="{{ route('list-loft') }}">
                            <i class="fa fa-star"></i> <span>Loft</span>
                        </a>
                    </li>
                    <li class="header">COMPANY PROFILE</li>
                    <li class="treeview {{ (request()->is('admin/cms/*')) ? 'active menu-open' : '' }}">
                        <a href="#">
                            <i class="fa fa-cubes"></i>
                            <span>CMS Home</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ (request()->is('admin/cms/cms-header*')) ? 'active' : '' }}"><a href="{{ route('cms-header-dashboard') }}"><i class="fa fa-circle-o"></i> Module Header</a></li>
                            {{-- <li class="{{ (request()->is('admin/cms/cms-content*')) ? 'active' : '' }}"><a href="{{ route('cms-content-dashboard') }}"><i class="fa fa-circle-o"></i> Module Content</a></li> --}}
                            <li class="{{ (request()->is('admin/cms/cms-footer*')) ? 'active' : '' }}"><a href="{{ route('cms-footer-dashboard') }}"><i class="fa fa-circle-o"></i> Module Footer</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="{{ route('list-ps') }}">
                            <i class="fa fa-product-hunt"></i> <span>CMS Product & Service</span>
                           
                        </a>
                        
                    </li>
                    <li class="{{ (request()->is('admin/list-contact*')) ? 'active' : '' }}">
                        <a href="{{ route('list-contact') }}">
                            <i class="fa fa-address-card-o"></i> <span>CMS Contact</span>
                           
                        </a>
                        
                    </li>
                    <li class="{{ (request()->is('admin/news*')) ? 'active' : '' }}">
                        <a href="{{ route('news-admin') }}">
                            <i class="fa fa-newspaper-o"></i> <span>CMS News</span>
                           
                        </a>
                        
                    </li>
                    <li class="{{ (request()->is('admin/cms-about-us*')) ? 'active' : '' }}">
                        <a href="{{ route('cms-about-us') }}">
                            <i class="fa fa-quote-right" ></i><span>CMS About Us</span>
                           
                        </a>
                        
                    </li>
                    
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        @yield('content')


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                {{-- <b>Version</b> 2.4.0 --}}
            </div>
            {{-- <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved. --}}
        </footer>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    @stack('admin-top-script')
    @include('admin.includes-admin.script')
    @stack('admin-bottom-script')

    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script>
        @if(session('Sukses'))
            swal("Sukses!", "{{ session('Sukses') }}", "success");
        @endif
        @if(session('Gagal'))
            swal("Gagal!", "{{ session('Gagal') }}", "error");
        @endif

        $('.delete-club').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Apakah yakin ingin menghapus data?',
                text: 'Data akan terhapus secara permanen',
                icon: 'warning',
                buttons: ["Tidak", "Ya!"],
            }).then(function (value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
    
</body>

</html>
