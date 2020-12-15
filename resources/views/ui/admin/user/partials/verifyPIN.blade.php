<div class="modal fade" id="verify-pin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				            <small>Verify {{ $user->username }}'s Support PIN</small>
				        </div>
				        <form role="form" method="POST" action="{{ url('/admin/user/'.$user->id.'/pin') }}">
				        	@csrf
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Enter Support PIN" type="password" name="pin" id="pin" required="">
				                </div>
				            </div>
				            <div class="text-center">
				                <button type="submit" class="btn btn-primary my-4">Verify PIN</button>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>