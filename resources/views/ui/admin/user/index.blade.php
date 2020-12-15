@extends('ui.layouts.master')

@section('title')
My Profile
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('overview') }}"><i class="fab fa-autoprefixer"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('overview') }}">USERS</a></li>
    <li class="breadcrumb-item active" aria-current="page"><u>{{ strtoupper($user->username) }}</u></li>
  </ol>
</nav>
@endsection

@section('nav_overview')
active
@endsection

@section('content')
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-7 col-md-10">
        <p class="text-white mt-0 mb-5">This is <b>{{ $user->username }}'s</b> profile page. You can perform update,suspend and ban actions on this user from here.</p>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-4 mb-5 mb-xl-0">
      <div class="card card-profile shadow pull-up">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a ">
                <img src="{{ asset('ui/img/profile/'.$user->avatar) }}" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
          </div>
        </div>
        <div class="card-body pt-0 pt-md-4">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                <div>
                  <span class="heading">{{ $user->totalAccounts() }}</span>
                  <span class="description">Accounts</span>
                </div>
                <div>
                  <span class="heading">{{ $user->totalFolders() }}</span>
                  <span class="description">Folders</span>
                </div>
                <div>
                  <span class="heading">{{ Setting::get('app_default_membership') }}</span>
                  <span class="description">Membership</span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <hr class="my-4" />
            <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#change-email">Change Email</button>
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#verify-pin">Verify Support PIN</button>
            @if($user->id != Auth::user()->id)
            @if($user->status=='Active')
            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#take-action">Take Action</button>
            @endif
            @if($user->type === 'default')
            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#make-admin">Promote User to Admin</button>
            @elseif($user->type === 'admin')
            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#make-user">Demote Admin to User</button>
            @endif
            @endif
            @if($user->status=='Banned')
            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete-user">Delete User Account</button>
            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#remove-ban">Remove BAN</button>
            @endif
            <a href="{{ url('/admin/user/'.$user->id.'/logs') }}" class="btn btn-secondary btn-block" >View IP Logs</a>
            
          </div>
          <hr class="my-4" />
          <small class="text-muted">
            <span class="badge badge-pill badge-danger">Note</span> You need to BAN a user before you can DELETE their account permanently. This has been done to reduce human errors.
          </small>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
  	@include('ui.partials.alerts')
  	@include('ui.partials.errors')
      <div class="card bg-secondary shadow pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">{{ $user->username }}'s account</h3>
            </div>
            <div class="col-4 text-right">
              @if($user->email_verified_at)
              <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Email Address Verified">Verified</button>
              @else
              <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Email Address Not Verified">Unverified</button>
              @endif
              @if($user->two_step)
              <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="2-Step Authentication Active">Secured</button>
              @else
              <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Activate 2-Step Authentication">Unsecured</button>
              @endif
            </div>
          </div>
        </div>
        <div class="card-body">
          <form role="form" method="POST" action="{{ route('updateProfile') }}">
          	@csrf
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Username</label>
                    <input type="text" id="input-username" class="form-control form-control-alternative" value="{{ $user->username }}" readonly="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="form-control form-control-alternative" value="{{ $user->email }}" readonly="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Full name</label>
                    <input type="text" id="input-first-name" class="form-control form-control-alternative" value="{{ $user->name }}" readonly="">
                  </div>
                </div>
                <div class="col-lg-6">
                  	<div class="form-group">
                    	<label class="form-control-label" for="dob">Date of Birth</label>
					    <div class="form-group">
						    <div class="input-group input-group-alternative">
						        <input class="form-control" type="text" value="{{ $user->dob }}" readonly="">
						    </div>
						</div>
					</div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Mobile #</label>
                    <input type="text" class="form-control form-control-alternative" value="{{ $user->mobile }}" readonly="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="country">Country</label>
                    <input type="text" class="form-control form-control-alternative" value="{{ $user->country }}" readonly="">
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Account information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="rng_level">Password RNG Preset <span data-toggle="tooltip" data-placement="right" title="Preset 1 to 4"><i class="fas fa-question-circle"></i></span></label>
                    <input type="text" class="form-control form-control-alternative" value="Preset {{ $user->rng_level }}" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="support_pin">Support PIN <span data-toggle="tooltip" data-placement="right" title="Admins Cant View User's Support PIN"><i class="fas fa-question-circle"></i></span></label>
                    <input type="text" class="form-control form-control-alternative" value="****" readonly="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="last_login">Last Login Date <span data-toggle="tooltip" data-placement="right" title="{{ $user->username }}'s Last Login Date'"><i class="fas fa-question-circle"></i></span></label>
                    <input type="text" class="form-control form-control-alternative" value="{{ $user->lastLoginAt() }}" readonly="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="login_ip">Last Login IP <span data-toggle="tooltip" data-placement="right" title="{{ $user->username }}'s Last Login IP"><i class="fas fa-question-circle"></i></span></label>
                    <input type="text" class="form-control form-control-alternative" value="{{ $user->lastLoginIp() }}" readonly="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="last_login">Account Status</label>
                    <input type="text" class="form-control form-control-alternative" value="{{ $user->status }}" readonly="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="login_ip">Remark <span data-toggle="tooltip" data-placement="right" title="Only when user is Suspended or Banned"><i class="fas fa-question-circle"></i></span></label>
                    <input type="text" class="form-control form-control-alternative" value="{{ $user->remark }}" readonly="">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('ui.admin.user.partials.changeEmail')
  @include('ui.admin.user.partials.verifyPIN')
  @include('ui.admin.user.partials.takeAction')
  @include('ui.admin.user.partials.removeBan')
  @include('ui.admin.user.partials.deleteUser')
  @include('ui.admin.user.partials.makeAdmin')
  @include('ui.admin.user.partials.makeUser')
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection