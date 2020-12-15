<div class="modal fade" id="add-account" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				            <small>Add New Account to Vault</small>
				        </div>
				        <form role="form" method="POST" action="{{ route('storeAccount') }}">
				        	@csrf
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-bold"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Title" type="text" name="title" id="title" required="">
				                </div>
				            </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
				                    </div>
				                    <select class="form-control" name="category_id" id="category_id" required="">
				                    	<option value="" selected="" disabled="">Select a category</option>
				                    	@foreach($categories as $category)
				                    	<option value="{{ $category->id }}">{{ $category->name }}</option>
				                    	@endforeach
				                    	
				                    </select>
				                </div>
				            </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="fas fa-link"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Link" type="text" name="link" id="link">
				                </div>
				            </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Account Login ID" type="text" name="login_id" id="login_id" required="">
				                </div>
				            </div>
				            <div class="form-group">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-key-25"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Account Login Password" type="text" name="login_password" id="new_login_password" required=""> 
				                    <button type="button" class="btn btn-success btn-sm random" name="random" id="random">Generate</button>
				                </div> 
				            </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-support-16"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Additional Info" type="text" name="additional_info" id="additional_info">
				                </div>
				            </div>
				            <div class="text-center">
				                <button type="submit" class="btn btn-success my-4">Add Account</button>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>