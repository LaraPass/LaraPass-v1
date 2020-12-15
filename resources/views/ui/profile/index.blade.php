@extends('ui.layouts.master')

@section('title')
My Profile
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('profile') }}">MY PROFILE</a></li>
  </ol>
</nav>
@endsection

@section('nav_profile')
active
@endsection

@section('content')
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-10 col-md-10">
        <h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
        <p class="text-white mt-0 mb-5">This is your profile page. You can update your personal and security information from here.</p>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    @if(Auth::user()->delete_on)
      @include('ui.partials.deletion')
    @endif
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow pull-up">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a >
                <img src="{{ asset('ui/img/profile/'.auth()->user()->avatar) }}" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
            <button type="button" data-toggle="modal" data-target="#change-avatar" class="btn btn-sm btn-default float-right">Change Avatar</a>
          </div>
        </div>
        <div class="card-body pt-0 pt-md-4">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                <div>
                  <span class="heading">{{ Auth::user()->totalAccounts() }}</span>
                  <span class="description">Accounts</span>
                </div>
                <div>
                  <span class="heading">{{ Auth::user()->totalFolders() }}</span>
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
          	<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#change-password">Change Password</button>
            <a href="{{ route('ipLogs') }}" class="btn btn-default btn-block" >View IP Logs</a>
            @if(Auth::user()->delete_on)
            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#cancel-deletion">Cancel Profile Deletion</button>
            @else
            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete-profile">Delete My Account</button>
            @endif
            <hr class="my-4" />
            <small class="text-muted">
      				<span class="badge badge-pill badge-danger">Note</span> Email Address cannot be changed by the user for security reasons. If you need to change your email address, please contact customer support using the contact page.
      			</small>
          </div>
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
              <h3 class="mb-0">My account</h3>
            </div>
            <div class="col-4 text-right">
              @if(Auth::user()->email_verified_at)
              <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Email Address Verified">Verified</button>
              @else
              <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Email Address Not Verified">Unverified</button>
              @endif
              @if(Auth::user()->two_step)
              <a href="" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="2-Step Authentication Active">Secured</a>
              @else
              <a href="{{ route('security') }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Activate 2-Step Authentication">Unsecured</a>
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
                    <input type="text" id="input-username" class="form-control form-control-alternative" value="{{ Auth::user()->username }}" readonly="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="form-control form-control-alternative" value="{{ Auth::user()->email }}" readonly="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Full name</label>
                    <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Your Full name" name="name" id="name" value="{{ Auth::user()->name }}" required="">
                  </div>
                </div>
                <div class="col-lg-6">
                  	<div class="form-group">
                    	<label class="form-control-label" for="dob">Date of Birth</label>
					    <div class="form-group">
						    <div class="input-group input-group-alternative">
						        <div class="input-group-prepend">
						            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
						        </div>
						        <input class="form-control datepicker" placeholder="Select date" type="text" value="{{ Auth::user()->dob }}" name="dob" id="dob" required="">
						    </div>
						</div>
					</div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Mobile #</label>
                    <input type="text" id="mobile" name="mobile" class="form-control form-control-alternative" value="{{ Auth::user()->mobile }}" placeholder="Enter Your Mobile Number" required="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Country</label>
                    <select name="country" id="country" class="form-control form-control-alternative" required="">
                		@if(Auth::user()->country)
                		<option value="{{ Auth::user()->country }}" default selected >{{ Auth::user()->country }}</option>
                		@endif
                		@if(!Auth::user()->country)
                		<option value="" default selected>Select Your Country</option>
                		@endif
                		@include('ui.profile.partials.countries')
                	</select>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Account information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="rng_level">Password Randomizer <span data-toggle="tooltip" data-placement="right" title="Select difficulty level of our Random String Generator"><i class="fas fa-question-circle"></i></span></label>
                    <select class="form-control" name="rng_level" id="rng_level">
	                    <option value="1" @if(Auth::user()->rng_level=='1') selected @endif>Weak [8 Characters Combo of (a-z) + (1-9)] </option>
	                    <option value="2" @if(Auth::user()->rng_level=='2') selected @endif>Normal [8 Characters Combo of (a-z) + (A-Z) + (1-9)] </option>
	                    <option value="3" @if(Auth::user()->rng_level=='3') selected @endif>Strong [12 Characters Combo of (a-z) + (A-Z) + (1-9) + (Special Characters)] </option>
	                    <option value="4" @if(Auth::user()->rng_level=='4') selected @endif>Very Strong [16 Characters Combo of (a-z) + (A-Z) + (1-9) + (Special Characters) + (Dashes)] </option>
                  	</select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="support_pin">Support PIN <span data-toggle="tooltip" data-placement="right" title="The 4 digit support pin is used by the support staff to verify your identity."><i class="fas fa-question-circle"></i></span></label>
                    <input type="text" id="support_pin" name="support_pin" class="form-control form-control-alternative" placeholder="Your 4-digit Support PIN" value="{{ Auth::user()->support_pin }}" required="">
                  </div>
                </div>
                <div class="col-lg-6">
		            <div class="text-center">
		              <button type="submit" class="btn btn-success my-4">Update profile</button>
		            </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Change Password Modal -->
	@include('ui.profile.partials.changePassword')
  @include('ui.profile.partials.changeAvatar')
  @include('ui.profile.partials.deleteProfile')
  @include('ui.profile.partials.cancelDeletion')
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection

@section('js')
<script src="{{ asset('ui/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
 	$("#password").keyup(function(){
  		check_pass();
 	});
});

function check_pass()
{
 	var val=document.getElementById("password").value;
 	var no=0;
 	if(val!="")
 	{
	  // If the password length is less than or equal to 6
	  if(val.length<=6)no=1;

	  // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
	  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

	  // If the password length is greater than 6 and contain alphabet,number,special character respectively
	  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

	  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
	  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

	  // If the password length is greater than 15 and must contain alphabets,numbers and special characters
	  if(val.length>15 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=5;

	  if(no==1)
	  {
	   document.getElementById("pass_type").innerHTML="Very Weak";
	  }

	  if(no==2)
	  {
	   document.getElementById("pass_type").innerHTML="Weak";
	  }

	  if(no==3)
	  {
	   document.getElementById("pass_type").innerHTML="Good";
	  }

	  if(no==4)
	  {
	   document.getElementById("pass_type").innerHTML="Strong ";
	  }

	  if(no==4)
	  {
	   document.getElementById("pass_type").innerHTML="Very Strong ";
	  }
 	}

	else
	{
	  document.getElementById("pass_type").innerHTML="";
	}
}
</script>
@endsection