<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				            <small>Add New Category</small>
				        </div>
				        <form role="form" method="POST" action="{{ route('addCategory') }}">
			          	@csrf
					    <div class="form-group">
			              <div class="input-group input-group-alternative mb-3">
			                <div class="input-group-prepend">
			                  <span class="input-group-text"><i class="fa fa-list"></i></span>
			                </div>
			                <input class="form-control" placeholder="Category Name" value="{{ old('name') }}"  name="name" id="name" type="text" required="">
			              </div>
			            </div>
			            <div class="text-center">
			              <button type="submit" class="btn btn-primary mt-4">Create New Category</button>
			            </div>
			          </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>