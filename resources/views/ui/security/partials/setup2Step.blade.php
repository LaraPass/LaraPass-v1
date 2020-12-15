<div class="modal fade" id="two-step" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <h3 align="center"><strong>Using an authenticator app like <a target="_blank" href="https://support.google.com/accounts/answer/1066447?hl=en">Google Authenticator</a>, scan the QR code.<br/> It will display a 6 digit code which you need to enter below.</strong></h3>
              <img src="{{ $google2fa_url }}" >
            </div>
            <form role="form" method="POST" action="{{ route('activate2FA') }}" id="add" name="add">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <input type="text" class="form-control" id="code" name="code" placeholder="Enter Authentication Code" required>
                  <button type="submit" class="btn btn-success btn-sm text-uppercase waves-effect waves-light">Confirm & Activate</button>
                </div>
              </div>
            </form>
            <hr>
            <div class="text-center">
              <a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank"><img class='app' src="https://primz.pw/app/assets/images/iphone.png" width="300px" height="100px"/></a>
              <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank"><img class="app" src="https://primz.pw/app/assets/images/android.png" width="300px" height="100px"/></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>