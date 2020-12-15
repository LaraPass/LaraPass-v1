@extends('ui.layouts.ep')

@section('title')
Verify Your Email at
@endsection

@section('content')
<!-- Page content -->
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            <h2>Verify Your Email Address</h2>
          </div>
          <form role="form" method="GET" action="{{ route('verification.resend') }}">
            @csrf
            <div class="form-group mb-3">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                 Before proceeding, please check your email for a verification link. If you don't see the email in your Inbox, check your spam folder as well.
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-sm my-4">Resend Verification Link</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
