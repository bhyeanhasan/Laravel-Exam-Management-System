<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title> @yield('title') </title>
  <!--===============Tell the browser to be responsive to screen width============-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============Font Awesome============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!--===============Ionicons============-->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'">
  <!--===============Tempusdominus Bbootstrap 4============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!--===============iCheck============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!--===============JQVMap============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
  <!--===============Theme style============-->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!--===============overlayScrollbars============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!--===============Daterange picker============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!--===============summernote============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
  <!--===============Google Font: Source Sans Pro============-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 <!--===============Navbar Start============-->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!--===============Left navbar links============-->
     <ul class="navbar-nav">
       <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
       <a href="{{ url('/')}}" class="nav-link">Home</a>
       </li>
     </ul>

     <!--===============SEARCH FORM============-->
     <form class="form-inline ml-3">
       <div class="input-group input-group-sm">
         <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-navbar" type="submit">
             <i class="fas fa-search"></i>
           </button>
         </div>
       </div>
     </form>

     <!--===============Right navbar links Start============-->
     <ul class="navbar-nav ml-auto">
       <!--===============Notifications Dropdown Menu Start============-->
           <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
               <i class="far fa-bell"></i>
               <span class="badge badge-warning navbar-badge">15</span>
             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <span class="dropdown-item dropdown-header">15 Notifications</span>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                 <i class="fas fa-envelope mr-2"></i> 4 new messages
                 <span class="float-right text-muted text-sm">3 mins</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                 <i class="fas fa-users mr-2"></i> 8 friend requests
                 <span class="float-right text-muted text-sm">12 hours</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                 <i class="fas fa-file mr-2"></i> 3 new reports
                 <span class="float-right text-muted text-sm">2 days</span>
               </a>
               <div class="dropdown-divider"></div>
             </div>
           </li>
           <li class="nav-item">
             <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
               <i class="fas fa-th-large"></i>
             </a>
           </li>
       <!--===============Notifications Dropdown Menu End============-->
     </ul>
     <!--===============Right navbar links End============-->
   </nav>
 <!--===============Navbar End============-->


 <!--===============Main Sidebar Start============-->
 @yield('sidebar')
<!--===============Main Sidebar End============-->

 <!--===============Footer Container Start============-->
   <footer class="main-footer">
     <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
       <b>Version</b> 3.0.5
     </div>
   </footer>
 <!--===============Footer Container End============-->

</div>


<!--===============jQuery============-->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!--===============jQuery UI 1.11.4============-->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!--===============Resolve conflict in jQuery UI tooltip with Bootstrap tooltip============-->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!--===============Bootstrap 4============-->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!--===============ChartJS============-->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!--===============Sparkline============-->
<script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!--===============JQVMap============-->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!--===============jQuery Knob Chart============-->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!--===============daterangepicker============-->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!--===============Tempusdominus Bootstrap 4============-->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!--===============Summernote============-->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!--===============overlayScrollbars============-->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!--===============AdminLTE App============-->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!--===============AdminLTE dashboard demo (This is only for demo purposes)============-->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
<!--===============AdminLTE for demo purposes============-->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/my/app.js') }}"></script>



@stack('scripts')
</body>
</html>
