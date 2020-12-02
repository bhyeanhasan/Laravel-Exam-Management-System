
@extends('layouts.app')
@section('sidebar')

<!--===============Sidebar Container Start============-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!--===============Brand Logo============-->
  <a href="index3.html" class="brand-link text-center">
    <span class="brand-text h4 text-center">Student Dashboard</span>
  </a>

  <!--============Sidebar============-->
  <div class="sidebar">

    <!--===============Sidebar Menu============-->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ url('/student/dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/student/exam') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Examination
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/student/result') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Result
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/student/logout') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logout
              </p>
            </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>


<!--===============Main Content Start====================-->
<div class="div" style="min-height: 85vh;">
 @yield('content')
</div>

@endsection

















