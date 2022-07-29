<!-- partial:partials/_sidebar.html -->
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
        <li class="nav-item {{ ('course' == $active)?'active' : '' }}">
          <a href="{{ url('admin/course') }}" class="nav-link">
            <i class="link-icon" data-feather="book"></i>
            <span class="link-title">Course</span>
          </a>
        </li>
        <li class="nav-item {{ ('course_list' == $active)?'active' : '' }}">
          <a href="{{ url('admin/course_list') }}" class="nav-link">
            <i class="link-icon" data-feather="list"></i>
            <span class="link-title">Course List</span>
          </a>
        </li>
        <li class="nav-item {{ ('course_access' == $active)?'active' : '' }}">
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
        {{-- <li class="nav-item nav-category">web apps</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Email</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
              </li>
            </ul>
          </div>
        </li> --}}
      </ul>
    </div>
  </nav>
      <!-- partial -->

      <div class="page-wrapper">

          <!-- partial:partials/_navbar.html -->
          <nav class="navbar">
              <a href="#" class="sidebar-toggler">
                  <i data-feather="menu"></i>
              </a>
              <div class="navbar-content">
                  <form class="search-form" method="GET">
                      <div class="input-group">
            <div class="input-group-text">
              <i data-feather="search"></i>
            </div>
                          <input type="text" class="form-control" id="keyword" name="keyword" value="{{ request()->keyword }}" placeholder="Search here...">
                      </div>
                  </form>
                  <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <i class="flag-icon flag-icon-id mt-1" title="id"></i> <span class="ms-1 me-1 d-none d-md-inline-block">Indonesia</span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
                            {{-- Gambar ada 2 link --}}
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                    {{-- Link kedua --}}
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">Amiah Burton</p>
                                    <p class="tx-12 text-muted">amiahburton@gmail.com</p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="pages/general/profile.html" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="user"></i>
                                    <span>Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="edit"></i>
                                    <span>Edit Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="repeat"></i>
                                    <span>Switch User</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="log-out"></i>
                                    <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                  </ul>
              </div>
          </nav>
          <!-- partial -->
