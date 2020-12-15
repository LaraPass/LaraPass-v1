<div class="modal fade" id="add_folder{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				            <small>Add <b>{{ $account->title }}</b> to a Folder</small>
				        </div>
				        <form role="form" method="POST" action="{{ url('/accounts/'.$account->id.'/folder/add') }}">
				        	@csrf
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-folder-17"></i></span>
				                    </div>
				                    <select class="form-control" name="folder" id="folder" required="">
				                    	<option value="" selected="" disabled="">Select a Folder</option>
				                    	@foreach($folders as $folder)
				                    	<option value="{{ $folder->id }}"><i class="fa fa-{{ $folder->icon }}"></i>&nbsp;&nbsp;&nbsp;{{ $folder->name }}</option>
				                    	@endforeach 
				                    	
				                    </select>
				                </div>
				            </div>
				            <div class="text-center">
				                <button type="submit" class="btn btn-default my-4">Add to Folder</button>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>