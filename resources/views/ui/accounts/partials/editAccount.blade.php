<div class="modal fade" id="edit-account" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				            <small>Edit Account { {{ $account->title }} }</small>
				        </div>
				        <form role="form" method="POST" action="{{ url('/accounts/'.$account->id) }}">
				        	<input type="hidden" name="_method" value="PATCH">
				        	@csrf
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-bold"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Title" type="text" name="title" id="title" value="{{ $account->title }}" required="">
				                </div>
				            </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-book-bookmark"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Link" type="text" name="link" id="link" value="{{ $account->link }}">
				                </div>
				            </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Account Login ID" type="text" name="login_id" id="login_id" value="{{ $account->login_id }}" required="">
				                </div>
				            </div>
				            <div class="form-group">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-key-25"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Account Login Password" type="text" name="login_password" id="new_login_password" value="{{ $account->login_password }}" required="">
				                    <button type="button" class="btn btn-success btn-sm random" name="random" id="random">Generate</button>
				                </div>
				            </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-support-16"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Additional Info" type="text" name="additional_info" id="additional_info" value="{{ $account->additional_info }}">
				                </div>
				            </div>
				            <div class="text-center">
				                <button type="submit" class="btn btn-primary my-4">Update Account</button>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>