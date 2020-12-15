<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				            <small>Add New User</small>
				        </div>
				        <form role="form" method="POST" action="{{ route('registerUser') }}">
			          	@csrf
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
			            <div class="text-center">
			              <button type="submit" class="btn btn-primary mt-4">Create account</button>
			            </div>
			          </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>