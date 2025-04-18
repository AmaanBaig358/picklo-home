<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In | {{ env('APP_NAME') }}</title>
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
    </style>
</head>

<body class="authentication-bg pb-0">

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">

        <div class="card-body d-flex flex-column h-100 gap-3">

            <!-- Logo -->
            <div class="auth-brand text-center text-lg-start">
                <a href="index.php" class="logo-dark">
                    <span><img src="https://picklohomes.com/wp-content/uploads/2021/09/picklo-homes-logo.png" alt="logo"
                               height="100"></span>
                </a>
                <a href="index.php" class="logo-light">
                    <span><img src="https://picklohomes.com/wp-content/uploads/2021/09/picklo-homes-logo.png" alt="logo"
                               height="100"></span>
                </a>
            </div>

            <div class="my-auto">
                <!-- title-->
                <h4 class="mt-0">Sign In</h4>
                <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                <!-- form -->
                <form method="post" action="{{ route('admin.login.process') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email address</label>
                        <input class="form-control" name="email" type="email" id="emailaddress" required=""
                               placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <a href="auth-recoverpw-2.php" class="text-muted float-end">
                            <small>Forgot your password?</small>
                        </a>
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" name="password" type="password" required="" id="password"
                               placeholder="Enter your password">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="d-grid mb-0 text-center">
                        <button class="btn btn-primary">Log In</button>
                    </div>
                    <!-- social-->
                    <div class="text-center mt-4">
                        <p class="text-muted fs-16">Sign in with</p>
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                            class="ri-facebook-circle-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                            class="ri-google-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                            class="ri-twitter-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                            class="ri-github-fill"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>
                <!-- end form-->
            </div>

            <!-- Footer-->
            <footer class="footer footer-alt">

            </footer>

        </div> <!-- end .card-body -->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->
@include('admin.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Daterangepicker js -->
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
<script src="{{ asset('admin-assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{ asset('admin-assets/js/app.min.js')}}"></script>
</body>

</html>
