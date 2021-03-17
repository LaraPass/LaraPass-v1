<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="{{ Setting::get('app_description') }}">
  <meta name="author" content="@LaraPass">
  <title>@yield('title') - {{ config('app.name') }} | Your Personal Password Manager</title> 
  <!-- Favicon -->
  <link href="{{ asset('ui/img/brand/'.setting()->get('app_favicon')) }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('ui/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('ui/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('ui/css/argon.css?v=1.0.0') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('ui/img/brand/'. setting()->get('app_logo_white')) }}" class="navbar-brand-img" alt="...">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="{{ url('/') }}">
                  <img src="{{ asset('ui/img/brand/'.setting()->get('app_logo')) }}">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="{{ url('/') }}">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="{{ route('register') }}">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Register</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header py-7 py-lg-8" style="background-color: {{ setting()->get('page_background_login') }}">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    @yield('content')
  </div>
  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
           2018-21 &copy;<a href="{{ url('/') }}" class="font-weight-bold ml-1" target="_blank">{{ Setting::get('app_name') }} </a><small>v{{ Setting::get('app_version') }}</small>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="{{ Setting::get('app_about') }}" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="{{ Setting::get('app_privacy') }}" class="nav-link" target="_blank">Privacy Policy</a>
            </li>
            <li class="nav-item">
              <a href="{{ Setting::get('app_terms') }}" class="nav-link" target="_blank">Terms of Service</a>
            </li> 
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Core -->
  <script src="{{ asset('ui/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('ui/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('ui/js/argon.js?v=1.0.0') }}"></script>
  @yield('js')
</body>

</html>