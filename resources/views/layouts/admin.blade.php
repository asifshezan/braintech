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
                            <span class="align-middle">Banner</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/partner') }}" class="sidebar-link">
                            <i class="fas fa-user"></i>
                            <span class="align-middle">Partner</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/testimonial') }}" class="sidebar-link">
                            <i class="fas fa-vial"></i>
                            <span class="align-middle">Testimonial</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/service') }}" class="sidebar-link">
                            <i class="fas fa-sliders"></i>
                            <span class="align-middle">Service</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/teammember')}}" class="sidebar-link">
                            <i class="fas fa-user-secret"></i>
                            <span class="align-middle">Team Member</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/client') }}" class="sidebar-link">
                            <i class="fas fa-person"></i>
                            <span class="align-middle">Client</span>
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
                            <i class="fas fa-person"></i>
                            <span class="align-middle">Contact Message</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('dashboard/newsletter') }}" class="sidebar-link">
                            <i class="fas fa-person"></i>
                            <span class="align-middle">Newsletter</span>
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
                                <a class="sidebar-link" href="#">Contents</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Pages</a>
                            </li>
                        </ul>
                    </li>



                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{url('/')}}" target="_blank">
                            <i class="fas fa-globe"></i>
                            <span class="align-middle">Live Site</span>
                        </a>
                    </li>
                    <form action="{{route('logout')}}" method="POST" id="logout-form"> @csrf <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('logout')}}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-right-from-bracket"></i>
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
                                <img src="{{asset('contents/admin')}}/img/avatars/avatar.jpg"
                                    class="avatar img-fluid rounded-circle me-1" alt="Chris Wood" />
                                <span class="text-dark">{{Auth::user()->name}}</span>
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
