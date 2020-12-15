@extends('ui.layouts.ep')

@section('title')
2-Step Authentication
@endsection

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            <h2>Welcome back, <span class="text-purple"> {{ Auth::user()->username }} </span></h2>
            <h3>{ Enter your <a href="#" class="text-danger">2-Step Authentication</a> Code }</h3>
          </div>
          <form role="form" method="POST" action="{{ route('authenticate') }}">
          	@csrf
            @include('ui.partials.ac-alerts')
            @include('ui.partials.errors')
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Enter 2-Step Authentication Code" type="password" name="code" id="code" required="">
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Sign in</button>
            </div>
          <a ><small>*Open the Google Authenticator app to view your verification code.</small></a>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 text-center">
          <a href="{{ route('logout') }}" class="text-light"><small>Not <b>{{ Auth::user()->username }}</b> ? Logout</small></a>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 text-center">
          <a href="{{ route('disable2FAView') }}" class="text-light"><small>Unable to use the Google Authenticator App? <b>Disable 2-Step</b></small></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection