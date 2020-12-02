
@extends('layouts.app')

@section('sidebar')

<!--===============Sidebar Container Start============-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!--===============Brand Logo============-->
  <a href="index3.html" class="brand-link text-center">
    <span class="brand-text h4 text-center">Admin System</span>
  </a>

  <!--============Sidebar============-->
  <div class="sidebar">

    <!--===============Sidebar Menu============-->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ url('/admin/dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/teacher') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Teacher
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/controller') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Controller
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/student') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Student
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/logout') }}" class="nav-link">
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

<!--===============Main Content Part============-->
<div style="min-height: 85vh;">
  @yield('content')
</div>

@endsection

















