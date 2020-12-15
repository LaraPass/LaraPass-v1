<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Setting::get('app_description')">
  <meta name="author" content="@LaraPass">
  <title>@yield('title') | {{ Setting::get('app_name') }}</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link href="{{ asset('ui/img/brand/'.setting()->get('app_favicon')) }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('ui/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('ui/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('ui/css/bootstrap-select.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('ui/css/custom.css') }}" rel="stylesheet">
  @yield('css')
  <script>
  window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
  ]); ?>
  </script>
  <link type="text/css" href="{{ asset('ui/css/argon.css?v=1.0.0') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('ui/css/breadcrumb.css') }}" rel="stylesheet">
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{ route('dashboard') }}">
        <img src="{{ asset('ui/img/brand/'.setting()->get('app_logo')) }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      @include('maintenancemode::notification')
      @include('ui.layouts.partials.mobilenav')
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ route('dashboard') }}">
                <img src="{{ asset('ui/img/brand/logo_main.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        @include('ui.partials.localMode')
        @include('ui.layouts.partials.nav')
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div id="app" class="main-content">
    <!-- Top navbar -->
    @include('ui.layouts.partials.topnav')
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8" style="background-color: {{ setting()->get('page_background_inner') }}">
      <!-- Content -->
      @yield('content')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('ui/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('ui/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Argon JS -->
  @yield('js')
  <script src="{{ asset('ui/js/argon.js?v=1.0.0') }}"></script>
  <script src="{{ asset('ui/js/bootstrap-select.js') }}"></script>
  @include('cookieConsent::index')
</body>

</html>