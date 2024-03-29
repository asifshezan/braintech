<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="{{asset('contents/admin')}}/img/favicon.ico">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/light.css" class="js-stylesheet">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/google-font.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <script src="{{asset('contents/admin')}}/js/sweetalert.min.js"></script>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{url('/')}}" target="_blank">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                        <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4 C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
                        <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5 c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
                        <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5 c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
                      </svg>
                    <span class="align-middle me-3">Creative</span>
                </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-header"> Navigation </li>
                    <li class="sidebar-item">
                        <a href="{{url('dashboard')}}" class="sidebar-link">
                            <i class="align-middle" data-feather="home"></i>
                            <span class="align-middle">Dashboards</span>
                        </a>
                    </li>
                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                    <li class="sidebar-item {{ Request::routeIs('user*') ? 'active' : '' }}">
                        <a data-bs-target="#sidebarUser" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i>
                            <span class="align-middle">Users</span>
                        </a>
                        <ul id="sidebarUser" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ Request::routeIs('user.index') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('dashboard/user') }}">All User</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/user/add') }}">Add User</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/role') }}">Role</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/banner') }}" class="sidebar-link">
                            <i class="align-middle" data-feather="airplay"></i>
                            <span class="align-middle">Banners</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/service') }}" class="sidebar-link">
                            <i class="fas fa-sliders"></i>
                            <span class="align-middle">Services</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#sidebarProject" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="fas fa-diagram-project"></i>
                            <span class="align-middle">Projects</span>
                        </a>
                        <ul id="sidebarProject" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/project') }}">All Projects</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/project/add') }}">Add Project</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/project-category') }}">Project Category</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/testimonial') }}" class="sidebar-link">
                            <i class="fas fa-vial"></i>
                            <span class="align-middle">Testimonials</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#sidebarPartner" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="fab fa-accusoft"></i>
                            <span class="align-middle">Partners</span>
                        </a>
                        <ul id="sidebarPartner" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/partner') }}">All Partners</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/partner/add') }}">Add Partner</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/teammember')}}" class="sidebar-link">
                            <i class="fas fa-user-secret"></i>
                            <span class="align-middle">Team Members</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/client') }}" class="sidebar-link">
                            <i class="fas fa-person"></i>
                            <span class="align-middle">Clients</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#sidebarGallery" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="fas fa-grip"></i>
                            <span class="align-middle">Gallery</span>
                        </a>
                        <ul id="sidebarGallery" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/gallery') }}">All Gallery</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/gallery/add') }}">Add Gallery</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/gallery-category') }}">Gallery Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/contact-message') }}" class="sidebar-link">
                            <i class="fas fa-message"></i>
                            <span class="align-middle">Contact Messages</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/newsletter') }}" class="sidebar-link">
                            <i class="fas fa-newspaper"></i>
                            <span class="align-middle">Newsletters</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#sidebarManage" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="fas fa-screwdriver-wrench"></i>
                            <span class="align-middle">Manage</span>
                        </a>
                        <ul id="sidebarManage" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/basic') }}">Basic Information</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/contact') }}">Contact Information</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/socialmedia') }}">Social Media</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/content') }}">Contents</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/page') }}">Pages</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#sidebarRecycle" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="fas fa-screwdriver-wrench"></i>
                            <span class="align-middle">Recycle Bin</span>
                        </a>
                        <ul id="sidebarRecycle" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/recycle/users') }}">Users</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/banner/recycle_banner') }}">Banners</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/service/recycle_service') }}">Services</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/recycle/project') }}">Projects</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/recycle/testimonials') }}">Testimonials</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/recycle/partners') }}">Partners</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/recycle/team-members') }}">Team Members</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/recycle/clients') }}">Clients</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/recycle/gallery') }}">Gallery</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('dashboard/recycle/newsletters') }}">Newsletters</a>
                            </li>
                        </ul>
                    </li>
                @endif
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{url('/')}}" target="_blank">
                            <i class="fas fa-globe"></i>
                            <span class="align-middle">Live Site</span>
                        </a>
                    </li>


                    <form action="{{route('logout')}}" method="POST" id="logout-form">
                             @csrf

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-right-from-bracket text-danger"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </li>
                    </form>
                </ul>
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header"> 1 New Notifications </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-success" data-feather="user-plus"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">New connection</div>
                                                <div class="text-muted small mt-1">Anna accepted your request.</div>
                                                <div class="text-muted small mt-1">12h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{ asset('uploads/users/'.Auth::user()->photo) }}"

                                    class="avatar img-fluid rounded-circle me-1" alt="Chris Wood" />
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="pages-profile.html">
                                    <i class="align-middle me-1" data-feather="user"></i> Profile </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-settings.html">
                                    <i class="align-middle me-1" data-feather="settings"></i> Settings </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{route('logout')}}" method="POST" id="logout-form">
                                    @csrf
                                    <a class="dropdown-item" href="{{route('logout')}}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="align-middle me-1" data-feather="log-out"></i> Sign out </a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12">
                            <p class="mb-0"> &copy; 2022 - <a href="{{url('/')}}" class="text-muted">Dashboard</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('contents/admin')}}/js/app.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom.js"></script>
</body>

</html>
