<div class="modal fade" id="change-avatar" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				        	<h4>Change Your Avatar</h4>
				            <small>Recommend Size 800x800</small>
				        </div>
				        <form role="form" method="POST" action="{{ route('updateAvatar') }}" enctype="multipart/form-data">
				        	@csrf
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
				                    </div>
				                    <input class="form-control" type="file" name="avatar" id="avatar" required="">
				                </div>
				            </div>
				            <div class="text-center">
				                <button type="submit" class="btn btn-default my-4">Change Avatar</button>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>