@extends('ui.layouts.master')

@section('title')
Application Settings
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('overview') }}"><i class="fab fa-autoprefixer"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('adminSettings') }}">APPLICATION SETTINGS</a></li>
  </ol>
</nav>
@endsection

@section('nav_settings')
active
@endsection

@section('content')
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-md-10">
        <h1 class="display-2 text-white">Application Settings</h1>
        <p class="text-white mt-0 mb-5">You can modify application settings from this page.</p>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      @include('ui.partials.alerts')
      @include('ui.partials.errors')
    </div>
    <div class="col-xl-6 order-xl-1">
      <div class="card bg-secondary shadow pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Application Settings</h3>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Current Application Version">{{ Setting::get('app_version') }}</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <button type="submit" class="btn btn-default btn-block" data-toggle="modal" data-target="#app_settings">Update Application Settings</button>
        </div>
      </div>

      <br/>
      <div class="card bg-secondary shadow pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Database Settings</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <button type="submit" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#database_settings">Update Database Settings</button>
        </div>
      </div>

      <br/>
      <div class="card bg-secondary shadow pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Mailer Settings</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <button type="submit" class="btn btn-warning btn-block" data-toggle="modal" data-target="#mailer_settings">Update Mailer Settings</button>
        </div>
      </div>
      
      <br/>
      <!-- Laravel Shortcuts -->
      @include('ui.admin.settings.partials.shortcuts')
    </div>
    <div class="col-xl-6 order-xl-1">
      <!-- Access Toggle -->
      @include('ui.admin.settings.partials.accessToggle')
      <br/>
      <!-- Maintenace Mode Partials -->
      @include('ui.admin.settings.partials.maintenance')
      <br/>
      <!-- Background Color Scheme Partial -->
      @include('ui.admin.settings.partials.backgroundScheme')
      <br/>
      <!-- Updates Partial -->
      @include('ui.admin.settings.partials.categories')
      <br/>
      <!-- Environment Toggle -->
      @include('ui.admin.settings.partials.environmentToggle')
    </div>
  </div>
  <!-- Application Settings Modal Start -->
  @include('ui.admin.settings.partials._applicationSettings')
  <!-- Application Settings Modal End -->
  <!-- Mailer Settings Modal Start -->
  @include('ui.admin.settings.partials._mailerSettings')
  <!-- Mailer Settings Modal End -->
  <!-- Database Settings Modal -->
    @include('ui.admin.settings.partials._databaseSettings')
  <!-- Database Settings Modal Ends -->
  <!-- Maintenance Mode Modal Start -->
  @include('ui.admin.settings.partials._maintenanceGoDown')
  <!-- Maintenace Mode Modal End -->
  <!-- Change Background Scheme Modal Start -->
  @include('ui.admin.settings.partials._changeScheme')
  <!-- Change Background Scheme Modal End -->
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>

<script type="text/javascript">
// Clipboard
var clipboard = new ClipboardJS('.btn');

$( document ).ready(function() {
  clipboard.on('success', function(e) {
    $(e.trigger).text("Copied!");
    e.clearSelection();
    setTimeout(function() {
      $(e.trigger).text("Copy");
    }, 2500);
  });

  clipboard.on('error', function(e) {
    $(e.trigger).text("Can't in Safari");
    setTimeout(function() {
      $(e.trigger).text("Copy");
    }, 2500);
  });

});
</script>
@endsection