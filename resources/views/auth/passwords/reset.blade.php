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
            <h2>Reset Your <span class="text-purple"> Password</span></h2>
            <small>Enter your email address and new password below</small>

          </div>
          <form method="POST" action="{{ route('password.update') }}">
          	@csrf
            @include('ui.partials.ac-alerts')
            @include('ui.partials.errors')
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Your Email Address" value="{{ old('email') }}" name="email" id="email" type="email" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="New Password" name="password" id="password" type="password" required="">
              </div>
            </div>
            <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700" id="pass_type"></span></small></div>
            <br/>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Repeat New Password" name="password_confirmation" id="confirm_password" type="password" required="">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Sign in</button>
            </div>
          </form>
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
@endsection