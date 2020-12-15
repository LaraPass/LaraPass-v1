@extends('ui.layouts.ep')

@section('title')
Register at
@endsection

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          @if(setting()->get('app_mode')=='PRIVATE')
          <div class="text-center text-muted mb-4">
            <h1><span class="text-purple"> Private Application </span></h1>
            <h3><span class="text-purple">{</span> Registrations are Closed <span class="text-purple">}</span></h3>
          </div>
          @elseif(setting()->get('app_mode')=='PUBLIC')
          <div class="text-center text-muted mb-4">
            <small>Create your free account</small>
          </div>
          <form role="form" method="POST" action="{{ route('register') }}">
          	@csrf
          	@if($errors->any())
    			    @foreach ($errors->all() as $error)
    			        <div class="alert alert-danger" role="alert">
    			            <strong>Oh snap!</strong> {{ $error }}
    			        </div>
    			    @endforeach
    			  @endif
			     <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-address-book"></i></span>
                </div>
                <input class="form-control" placeholder="Full Name" value="{{ old('name') }}"  name="name" id="name" type="text" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                </div>
                <input class="form-control" placeholder="Username" value="{{ old('username') }}"  name="username" id="username" type="text" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" id="email" type="email" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Password" name="password" id="password" type="password" required="">
              </div>
            </div>
            <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700" id="pass_type"></span></small></div>
            <br/>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Repeat Password" name="password_confirmation" id="confirm_password" type="password" required="">
              </div>
            </div>
            <div class="row my-4">
              <div class="col-12">
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="customCheckRegister" type="checkbox" required="">
                  <label class="custom-control-label" for="customCheckRegister">
                    <span class="text-muted">I agree with the <a href="c">Privacy Policy</a> and <a href="#">Terms of Service</a></span>
                  </label>
                </div>
              </div>
            </div>
            @captchaHTML
            <div class="text-center">
              @if(setting()->get('recaptcha_active') == 'false')
              <button type="button" class="btn btn-danger disabled mt-4">Setup reCaptcha to Enable Registration</button>
              @else
              <button type="submit" class="btn btn-primary mt-4">Create account</button>
              @endif
            </div>
          </form>
          @endif
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <a href="{{ url('password/reset') }}" class="text-light"><small>Forgot password?</small></a>
        </div>
        <div class="col-6 text-right">
          <a href="{{ route('login') }}" class="text-light"><small>Already have an account? Sign In</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
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
	   document.getElementById("pass_type").innerHTML="Very Weak [think of a better password]";
	  }

	  if(no==2)
	  {
	   document.getElementById("pass_type").innerHTML="Weak [still need a better password]";
	  }

	  if(no==3)
	  {
	   document.getElementById("pass_type").innerHTML="Good [Its ok, but you can do better]";
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
@captchaScripts
@endsection
