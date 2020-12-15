@extends('ui.layouts.master')

@section('title')
Security Settings
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('security') }}">SECURITY</a></li>
  </ol>
</nav>
@endsection

@section('nav_security')
active
@endsection

@section('content')
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white">Wait {{ Auth::user()->name }}</h1>
        <p class="text-white mt-0 mb-5">You can manage your account security settings from here. It is recommended to activate 2-Step Authentication for better security.</p>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-6 order-xl-1">
    @include('ui.partials.alerts')
    @include('ui.partials.errors')
      @if(! Auth::user()->security_questions)
      <div class="card bg-secondary shadow border-danger  pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Security Questions</h3>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Setup Seucirty Questions">Unlocked</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Setup Security Questions By Clicking the button below</h6>
          <button class="btn btn-icon btn-3 btn-danger btn-block" type="button" data-toggle="modal" data-target="#security-questions">
            <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
            <span class="btn-inner--text">Setup Security Questions</span>
          </button>
        </div>
      </div>
      @else
      <div class="card bg-secondary shadow pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Security Questions</h3>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Seucirty Questions Secured">Locked</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Security Questions Setup Complete</h6>
        </div>
      </div>
      @endif
    </div>
    <div class="col-xl-6 order-xl-1">
      @if(! Auth::user()->two_step)
      <div class="card bg-secondary shadow border-danger pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">2-Step Authentication (GFA)</h3>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Please activate 2-Step Authentication">Inactive</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Activate 2-Step Authentication by Clicking the button below</h6>
          @if(! Auth::user()->security_questions)
          <button class="btn btn-icon btn-3 btn-danger btn-block" type="button" disabled="" data-toggle="tooltip" data-placement="top" title="You need to setup security questions first">
            <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
            <span class="btn-inner--text">Activate 2-Step Authentication</span>
          </button>
          @else
          <button class="btn btn-icon btn-3 btn-danger btn-block" type="button" data-toggle="modal" data-target="#two-step">
            <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
            <span class="btn-inner--text">Activate 2-Step Authentication</span>
          </button>
          @endif
        </div>
      </div>
      @else
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0 pull-up">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">2-Step Authentication (GFA)</h3>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Your Account is Secured">Active</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Deactivate 2-Step Authentication by Clicking below</h6>
          <button class="btn btn-icon btn-3 btn-default btn-block" type="button" data-toggle="modal" data-target="#two-step-remove">
            <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
            <span class="btn-inner--text">Deactivate 2-Step Authentication</span>
          </button>
        </div>
      </div>
      @endif
    </div>
  </div>
  <!-- Setup Security Questions Modal -->
  @include('ui.security.partials.securityQuestions')
  <!-- Setup 2-Step Auth Modal -->
  @include('ui.security.partials.setup2Step')
  <!-- Remove 2-Step Auth Modal -->
  @include('ui.security.partials.remove2Step')
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection