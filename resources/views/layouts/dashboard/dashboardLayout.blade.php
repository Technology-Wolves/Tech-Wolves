<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tech Wolves - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo-head.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logo-head.png') }}" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dashboard/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/about')}}" class="nav-link">About</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/contacts')}}" class="nav-link">Contact</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/contacts#contact-map')}}" class="nav-link">Maps</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/products')}}" class="nav-link">Products</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-center" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{asset('/images/logo-head-white.png')}}" alt="Tech wolves Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Tech Wolves</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset(('uploads/profileImage/'. Auth::user()->profileImage))}}" class="img-circle elevation-2" alt="{{ Auth::user()->name }} {{__('\'s profile pic')}}" style="height: 40px; width: 40px; border: 2px solid #ddd;margin: 2px 0 0 -4px;">
                </div>
                <div class="info">
                    <a href="{{ url('/viewProfile', Auth::user()->id) }}" class="d-block" style="margin-top: 5px;">{{ Str::limit(Auth::user()->name, 18) }}</a>
                </div>
            </div>

        @if(Auth::user()->isAdmin == true && Auth::user()->regType == 'ADMIN')
            <!-- Admin Sidebar Menu begins -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-header">Admin Features</li>
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link {{ Request::path() === 'home' ? 'active': '' }}">
                                <i class="nav-icon fas fa-house-user"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/viewProfile', Auth::user()->id) }}" class="nav-link {{ Request::path() === ('viewProfile/'. Auth::user()->id) ? 'active': '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/changePassword', Auth::user()->id) }}" class="nav-link {{ Request::path() === ('changePassword/'. Auth::user()->id) ? 'active': '' }}">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Change Password
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/getProductsAdmin') }}" class="nav-link {{ Request::path() === 'getProductsAdmin' ? 'active': '' }}">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>
                                    View Added Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/getAllUsers') }}" class="nav-link {{ Request::path() === 'getAllUsers' ? 'active': '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    View All Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/getAllOrders') }}" class="nav-link {{ Request::path() === 'getAllOrders' ? 'active': '' }}">
                                <i class="fas fa-thumbs-up"></i>
                                <p>
                                     Approve Orders
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/shortStatusPage') }}" class="nav-link {{ Request::path() === 'shortStatusPage' ? 'active': '' }}">
                                <i class="fas fa-filter"></i>
                                <p>
                                    Short Order Status
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Admin Sidebar-menu ends -->
        @endif

        @if(Auth::user()->isAdmin == false && Auth::user()->regType == 'seller')
            <!-- Seller Sidebar Menu begins -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-header">Seller Features</li>
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link {{ Request::path() === 'home' ? 'active': '' }}">
                                <i class="nav-icon fas fa-house-user"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/addProduct') }}" class="nav-link {{ Request::path() === 'addProduct' ? 'active': '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Add Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/addedProducts') }}" class="nav-link {{ Request::path() === 'addedProducts' ? 'active': '' }}">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>
                                    View Added Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/viewProfile', Auth::user()->id) }}" class="nav-link {{ Request::path() === ('viewProfile/'. Auth::user()->id) ? 'active': '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/changePassword', Auth::user()->id) }}" class="nav-link {{ Request::path() === ('changePassword/'. Auth::user()->id) ? 'active': '' }}">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Change Password
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/gallery.html" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/mailbox/mailbox.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inbox</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/mailbox/compose.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Compose</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/mailbox/read-mail.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Read</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- Seller Sidebar-menu ends -->
        @endif

        @if(Auth::user()->isAdmin == false && Auth::user()->regType == 'buyer')
            <!-- Buyer Sidebar Menu begins -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-header">Buyer Features</li>
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">
                                <i class="nav-icon fas fa-house-user"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/viewProfile', Auth::user()->id) }}" class="nav-link {{ Request::path() === ('viewProfile/'. Auth::user()->id) ? 'active': '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/changePassword', Auth::user()->id) }}" class="nav-link {{ Request::path() === ('changePassword/'. Auth::user()->id) ? 'active': '' }}">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Change Password
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/viewOrders') }}" class="nav-link {{ Request::path() === ('viewOrders') ? 'active': '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    View Orders
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/favourites') }}" class="nav-link {{ Request::path() === ('favourites') ? 'active': '' }}">
                                <i class="nav-icon fas fa-heart"></i>
                                <p>
                                    Favourites
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Buyer Sidebar-menu ends -->
            @endif
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('main-section')

    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="https://devish.com.np" target="_blank">Tech Wolves</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>-</b>
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('/dashboard/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/dashboard/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('/dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('/dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dashboard/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/dashboard/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/dashboard/dist/js/demo.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('/js/script.js') }}"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f01b45c760b2b560e6fc4a4/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<script>
    // hide alert messages
    $(".alert").fadeTo(3000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
</script>
</body>
</html>
