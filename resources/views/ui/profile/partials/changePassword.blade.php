<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				            <small>Change your password</small>
				        </div>
				        <form role="form" method="POST" action="{{ route('updatePassword') }}">
				        	@csrf
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Current Password" type="password" name="current_password" id="current_password" required="">
				                </div>
				            </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Enter New Password" type="password" name="password" id="password" required="">
				                </div>
				            </div>
				            <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700" id="pass_type"></span></small></div>
				            <br/>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Repeat New Password" type="password" name="password_confirmation" id="confirm_password">
				                </div>
				            </div>
				            <div class="text-center">
				                <button type="submit" class="btn btn-info my-4">Change Password</button>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>