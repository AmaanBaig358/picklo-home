<!DOCTYPE html>
<html lang="en">

<head>

    <title>{{ $title ?? 'Home' }} - {{ env('APP_NAME') }}</title>
    <meta charset="utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/daterangepicker/daterangepicker.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet"
          href="{{ asset('admin-assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}">
    <script src="{{ asset('admin-assets/js/config.js')}}"></script>
    <!-- App css -->
    <link href="{{ asset('admin-assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
    <!-- Icons css -->
    <link href="{{ asset('admin-assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <style>
        .ajs-message.ajs-visible {
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            border-radius: 25px;
        }

        .card-body .nav.nav-pills li {
            padding: 0px 15px;
            display: inline-block;
            width: 25% !important;
            max-width: 25% !important;
        }

        .card-body .nav.nav-pills li span {
            text-transform: capitalize;
            font-size: 14px;
        }
        #progressbarwizard .tab-content .tab-pane .mb-3 {
            display: inline-block;
            width: 35%;
        }
        .leftside-menu.menuitem-active {
            background: rgb(67,159,199);
            background: linear-gradient(38deg, rgba(67,159,199,1) 25%, rgba(57,128,74,1) 75%);
        }
        div#leftside-menu-container {
            background: rgb(67,159,199);
            background: linear-gradient(38deg, rgba(67,159,199,1) 25%, rgba(57,128,74,1) 75%);
        }
        .side-nav .side-nav-link {
             color: #ffffff;
        }
        li.side-nav-title {
            color: #ffffff !important;
        }
        .side-nav-second-level li a {
            color: #ffffff !important;
        }
        li.breadcrumb-item a {
             color: #0f4c2c;
         }
        .page-title {
            color: #0f4c2c;
        }
        a.logo.logo-light {
            /*background: rgb(67,159,199);*/
            /*background: linear-gradient(38deg, rgba(67,159,199,1) 25%, rgba(57,128,74,1) 75%);*/
        }
        ul.side-nav-second-level {
            /*background: rgb(67,159,199);*/
            /*background: linear-gradient(38deg, rgba(67,159,199,1) 25%, rgba(57,128,74,1) 75%);*/
        }
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .wrapper .leftside-menu .side-nav .side-nav-item:hover .side-nav-link {
            position: relative;
            color: #fff;
            background: #2a7c51;
            width: var(--ct-leftbar-width);
        }

        .btn {
            box-shadow: 0 5px 5px #34814b !important;
            border: 1px solid #4398b1 !important;
            color: #ffff !important;
            background: #459abb !important;
        }
        .active>.page-link {
            box-shadow: 0 5px 5px #34814b;
            border: 1px solid #4398b1 !important;
            background: #459abb !important;
        }
        .ms-3 {
            margin-left: 0.5rem !important;
        }
        .mb-4 {
            margin-bottom: 1rem !important;
        }
        .leftside-menu {
            z-index: 1000;
            bottom: 0;
            top: 0;
            position: fixed;
            width: var(--ct-leftbar-width);
            min-width: var(--ct-leftbar-width);
            padding-bottom: calc(var(--ct-footer-height) + .75rem);
            background: #34804a;
            -webkit-box-shadow: var(--ct-box-shadow);
            box-shadow: var(--ct-box-shadow);
            border-right: var(--ct-theme-card-border-width) solid var(--ct-border-color);
            -webkit-transition: all .25s ease-in-out;
            transition: all .25s ease-in-out;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            box-shadow: 0 5px 5px #34814b;
            border: 1px solid #4398b1 !important;
            background: #459abb !important;
        }

        a.show-lead {
            color: #6c757d;
        }
        table.dataTable tbody td.focus, table.dataTable tbody th.focus {
            outline: 0px solid #ffffff !important;
            outline-offset: -1px;
            background-color: rgba(var(--ct-primary-rgb), .15);
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #4898bb !important;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: default;
            color: #fff;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px;
        }

    </style>

    <link href="{{ asset('admin-assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin-assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet')}}"
          type="text/css"/>
    <link href="{{ asset('admin-assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}"
          rel="stylesheet" type="text/css"/>
    @stack('styles')
</head>

<body>
<!-- Begin page -->
<div class="wrapper">
    <div class="navbar-custom">
        <div class="topbar container-fluid">
            <div class="d-flex align-items-center gap-lg-2 gap-1">
                <div class="logo-topbar">
                    <a href="{{ route('admin.dashboard') }}" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('admin-assets/assets/images/picklo-homes-logo.webp')}}" alt="logo">
                    </span>
                        <span class="logo-sm">
                        <img src="{{ asset('admin-assets/images/logo-sm.png')}}" alt="small logo">
                    </span>
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('admin-assets/images/picklo-homes-logo.webp')}}" alt="dark logo">
                    </span>
                        <span class="logo-sm">
                        <img src="{{ asset('admin-assets/images/picklo-homes-logo.webp')}}" alt="small logo">
                    </span>
                    </a>
                </div>
                <button class="button-toggle-menu">
                    <i class="ri-menu-2-fill"></i>
                </button>
                <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="app-search dropdown d-none d-lg-block">
                    <form>
                        <div class="input-group">
                            <input type="search" class="form-control dropdown-toggle" placeholder="Search..."
                                   id="top-search">
                            <span class="ri-search-line search-icon"></span>
                        </div>
                    </form>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow mb-1">Found <b class="text-decoration-underline">08</b> results
                            </h5>
                        </div>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="ri-file-chart-line fs-16 me-1"></i>
                            <span>Analytics Report</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="ri-lifebuoy-line fs-16 me-1"></i>
                            <span>How can I help you?</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="ri-user-settings-line fs-16 me-1"></i>
                            <span>User profile settings</span>
                        </a>
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow mt-2 mb-1 text-uppercase">Users</h6>
                        </div>
                        <div class="notification-list">

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle"
                                         src="{{ asset('admin-assets/images/users/avatar-2.jpg')}}"
                                         alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 fs-14">Erwin Brown</h5>
                                        <span class="fs-12 mb-0">UI Designer</span>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle"
                                         src="{{ asset('admin-assets/images/users/avatar-5.jpg')}}"
                                         alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 fs-14"></h5>
                                        <span class="fs-12 mb-0">Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="topbar-menu d-flex align-items-center gap-3">
                <li class="dropdown d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i class="ri-search-line fs-22"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                        <form class="p-3">
                            <input type="search" class="form-control" placeholder="Search ..."
                                   aria-label="Recipient's username">
                        </form>
                    </div>
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i class="ri-notification-3-line fs-22"></i>
                        <span class="noti-icon-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                        <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold"> Notification</h6>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                        <small>Clear All</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div style="max-height: 300px;" data-simplebar>
                            <h5 class="text-muted fs-12 fw-bold p-2 text-uppercase mb-0">Today</h5>
                            <a href="javascript:void(0);"
                               class="dropdown-item p-0 notify-item unread-noti card m-0 shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon bg-primary">
                                                <i class="ri-message-3-line fs-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold fs-14">Datacorp
                                                <small class="fw-normal text-muted float-end ms-1">1 min ago</small>
                                            </h5>
                                            <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                Admin
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);"
                               class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon bg-info">
                                                <i class="ri-user-add-line fs-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold fs-14">Admin
                                                <small class="fw-normal text-muted float-end ms-1">1 hr ago</small>
                                            </h5>
                                            <small class="noti-item-subtitle text-muted">New user registered</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <h5 class="text-muted fs-12 fw-bold p-2 mb-0 text-uppercase">Yesterday</h5>
                            <a href="javascript:void(0);"
                               class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon">
                                                <img src="{{ asset('admin-assets/images/users/avatar-2.jpg')}}"
                                                     class="img-fluid rounded-circle" alt=""/>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold fs-14">Cristina Pride
                                                <small class="fw-normal text-muted float-end ms-1">1 day ago</small>
                                            </h5>
                                            <small class="noti-item-subtitle text-muted">Hi, How are you? What about our
                                                next meeting
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <h5 class="text-muted fs-12 fw-bold p-2 mb-0 text-uppercase">31 Jan 2023</h5>
                            <a href="javascript:void(0);"
                               class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon bg-primary">
                                                <i class="ri-discuss-line fs-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold fs-14">Datacorp</h5>
                                            <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                Admin
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);"
                               class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon">
                                                <img src="{{ asset('admin-assets/images/users/avatar-4.jpg')}}"
                                                     class="img-fluid rounded-circle" alt=""/>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <h5 class="noti-item-title fw-semibold fs-14">Karen Robinson</h5>
                                            <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and
                                                awesome design
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:void(0);"
                           class="dropdown-item text-center text-primary text-decoration-underline fw-bold notify-item border-top border-light py-2">
                            View All
                        </a>
                    </div>
                </li>
                <li class="d-none d-sm-inline-block">
                    <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left"
                         title="Theme Mode">
                        <i class="ri-moon-line fs-22"></i>
                    </div>
                </li>
                <li class="d-none d-md-inline-block">
                    <a class="nav-link" href="" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line fs-22"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ (!empty(Auth::user()->profile_image) ? asset('/' .Auth::user()->profile_image) : asset('admin-assets/images/profile-4.jpg') ) }}"
                             alt="user-image" width="32" class="rounded-circle">
                    </span>
                        <span class="d-lg-flex flex-column gap-1 d-none">
                        <h5 class="my-0">{{ Auth::user()->name }}</h5>
                        <h6 class="my-0 fw-normal">{{ Auth::user()->getRoleNames()->join(', ') }}</h6>
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>
                        <a href="javascript:" class="dropdown-item">
                            <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                            <span>My Account</span>
                        </a>
                        <a href="javascript:" class="dropdown-item">
                            <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                            <span>Settings</span>
                        </a>
                        <a href="javascript:" class="dropdown-item">
                            <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
                            <span>Support</span>
                        </a>
                        <a href="javascript:" class="dropdown-item">
                            <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
                            <span>Lock Screen</span>
                        </a>
                        <a href="{{ route('admin.logout') }}" class="dropdown-item">
                            <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @yield('main-content')
    @include('admin.partials.sidebar')
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="card mb-0 p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>
                    <h5 class="mt-0 fs-16 fw-bold mb-3">Choose Layout</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input id="customizer-layout01" name="data-layout" type="checkbox" value="vertical"
                                   class="form-check-input">
                            <label class="form-check-label" for="customizer-layout01">Vertical</label>
                        </div>
                        <div class="form-check form-switch">
                            <input id="customizer-layout02" name="data-layout" type="checkbox" value="horizontal"
                                   class="form-check-input">
                            <label class="form-check-label" for="customizer-layout02">Horizontal</label>
                        </div>
                    </div>
                    <h5 class="my-3 fs-16 fw-bold">Color Scheme</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light"
                                   value="light">
                            <label class="form-check-label" for="layout-color-light">Light</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark"
                                   value="dark">
                            <label class="form-check-label" for="layout-color-dark">Dark</label>
                        </div>
                    </div>
                    <div id="layout-width">
                        <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                       id="layout-mode-fluid" value="fluid">
                                <label class="form-check-label" for="layout-mode-fluid">Fluid</label>
                            </div>
                            <div id="layout-boxed">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                           id="layout-mode-boxed" value="boxed">
                                    <label class="form-check-label" for="layout-mode-boxed">Boxed</label>
                                </div>
                            </div>
                            <div id="layout-detached">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                           id="data-layout-detached" value="detached">
                                    <label class="form-check-label" for="data-layout-detached">Detached</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                   id="topbar-color-light" value="light">
                            <label class="form-check-label" for="topbar-color-light">Light</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                   id="topbar-color-dark" value="dark">
                            <label class="form-check-label" for="topbar-color-dark">Dark</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                   id="topbar-color-brand" value="brand">
                            <label class="form-check-label" for="topbar-color-brand">Brand</label>
                        </div>
                    </div>
                    <div>
                        <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                       id="leftbar-color-light" value="light">
                                <label class="form-check-label" for="leftbar-color-light">Light</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                       id="leftbar-color-dark" value="dark">
                                <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                       id="leftbar-color-brand" value="brand">
                                <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                            </div>
                        </div>
                    </div>
                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-default" value="default">
                                <label class="form-check-label" for="leftbar-size-default">Default</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-compact" value="compact">
                                <label class="form-check-label" for="leftbar-size-compact">Compact</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-small" value="condensed">
                                <label class="form-check-label" for="leftbar-size-small">Condensed</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-small-hover" value="sm-hover">
                                <label class="form-check-label" for="leftbar-size-small-hover">Hover View</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-full" value="full">
                                <label class="form-check-label" for="leftbar-size-full">Full Layout</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-fullscreen" value="fullscreen">
                                <label class="form-check-label" for="leftbar-size-fullscreen">Fullscreen Layout</label>
                            </div>
                        </div>
                    </div>
                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                                   value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position"
                                   id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0"
                                   for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>

                    <div id="sidebar-user">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <label class="fs-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="sidebar-user"
                                       id="sidebaruser-check">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="#" role="button" class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admin-assets/js/vendor.min.js')}}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

{{--<!-- Datatable Demo App js -->--}}
<script src="{{ asset('admin-assets/js/pages/demo.datatable-init.js') }}"></script>
<script src="{{ asset('admin-assets/js/app.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@if(session('errors'))
    @php
        $validationErrors = session('errors')->all();
    @endphp
    <script>
        @foreach($validationErrors as $error)
        alertify.error('{{$error}}');
        @endforeach
    </script>
@endif
@if(session()->has('error'))
    <script>
        alertify.error('{{ session('error') }}')
    </script>
@endif
@if(session()->has('success'))
    <script>
        alertify.success('{{ session('success') }}')
    </script>
@endif
@stack('scripts')
</body>

</html>
