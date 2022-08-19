@php
    $active = null;
@endphp
<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{ url('dashboard') }}" class="sidebar-brand">
        LF<span>F</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item {{ ('dashboard' == $active)?'active' : '' }}">
          <a href="{{ url('dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item nav-category">Course</li>
        <li class="nav-item {{ $active == 'courses' ? 'active' : '' }}">
          <a href="{{ url('admin/course') }}" class="nav-link">
            <i class="link-icon" data-feather="book"></i>
            <span class="link-title">Course</span>
          </a>
        </li>
        {{-- <li class="nav-item {{ $active == 'course_list' ? 'active' : '' }}">
          <a href="{{ url('admin/course_list') }}" class="nav-link">
            <i class="link-icon" data-feather="list"></i>
            <span class="link-title">Course List</span>
          </a>
        </li> --}}
        <li class="nav-item {{ $active == 'access' ? 'active' : '' }}">
          <a href="{{ url('admin/course_access') }}" class="nav-link">
            <i class="link-icon" data-feather="key"></i>
            <span class="link-title">Course Access</span>
          </a>
        </li>
        <li class="nav-item {{ ('category' == $active)?'active' : '' }}">
          <a href="{{ url('admin/category') }}" class="nav-link">
            <i class="link-icon" data-feather="tag"></i>
            <span class="link-title">Category</span>
          </a>
        </li>

        <li class="nav-item nav-category">Finance</li>
        <li class="nav-item {{ ('order' == $active)? 'active' : '' }}">
          <a href="{{ url('admin/order') }}" class="nav-link">
            <i class="link-icon" data-feather="shopping-cart"></i>
            <span class="link-title">Order</span>
          </a>
        </li>
        <li class="nav-item {{ ('payment' == $active)? 'active' : '' }}">
          <a href="{{ url('admin/payment') }}" class="nav-link">
            <i class="link-icon" data-feather="dollar-sign"></i>
            <span class="link-title">Payment</span>
          </a>
        </li>
        <li class="nav-item {{ ('payment_method' == $active)? 'active' : '' }}">
          <a href="{{ url('admin/payment_method') }}" class="nav-link">
            <i class="link-icon" data-feather="pocket"></i>
            <span class="link-title">Payment Method</span>
          </a>
        </li>

        <li class="nav-item nav-category">Admin</li>
        <li class="nav-item {{ ('users' == $active)? 'active' : '' }}">
          <a href="{{ url('admin/user') }}" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Users</span>
          </a>
        </li>
        <li class="nav-item {{ ('role' == $active)? 'active' : '' }}">
          <a href="{{ url('admin/role') }}" class="nav-link">
            <i class="link-icon" data-feather="shield"></i>
            <span class="link-title">Roles</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
      <!-- partial -->
