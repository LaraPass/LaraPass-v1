@extends('ui.layouts.ep')

@section('title')
Reset My Password
@endsection

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            <h2>Reset My <span class="text-purple"> Password</span></h2>
            <small>Enter your email address to receive a password reset link</small>
          </div>
          <form role="form" method="POST" action="{{ route('password.email') }}">
          	@csrf
            @include('ui.partials.ac-alerts')
            @include('ui.partials.errors')
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Your Registered Email Address" type="text" name="email" id="email" required="">
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Reset Password</button>
            </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <a href="{{ route('login') }}" class="text-light"><small>Back to Login Page</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection