@extends('ui.layouts.ep')

@section('title')
Login to
@endsection

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            <small>Sign in with your credentials</small>
          </div>
          <form role="form" method="POST" action="{{ route('login') }}">
          	@csrf
            @include('ui.partials.ac-alerts')
            @include('ui.partials.errors')
            @include('ui.partials.alerts')
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                </div>
                <input class="form-control" placeholder="Username" type="text" name="username" id="username" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Password" type="password" name="password" id="password" required="">
              </div>
            </div>
            <div class="custom-control custom-control-alternative custom-checkbox">
              <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember">
              <label class="custom-control-label" for=" customCheckLogin">
                <span class="text-muted">Remember me</span>
              </label>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Sign in</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <a href="{{ url('/password/reset') }}" class="text-light"><small>Forgot password?</small></a>
        </div>
        <div class="col-6 text-right">
          <a href="{{ route('register') }}" class="text-light"><small>Create new account</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection