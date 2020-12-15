@if(! $folders->isEmpty())
<hr>
	<h5 class="heading-small text-muted mb-4">Your Folders</h5>
	@foreach($folders as $folder)
	<div style="padding-bottom: 3px;">
	  	<span data-toggle="modal" data-target="#folder-details-{{ $folder->id }}">
		    <button type="button" class="btn btn-default btn-block" data-toggle="tooltip" data-placement="left" title="Open Folder">
		    <span><i class="fa fa-{{ $folder->icon }}"></i>&nbsp;&nbsp;&nbsp;{{ $folder->name }}</span>
		    <span class="badge badge-white">{{ $folder->accounts()->count() }}</span>
		    @if($folder->password)
		    <span class="pull-right"><i class="fas fa-lock"></i></span>
		    @else
		    <span class="pull-right"><i class="fa fa-unlock"></i></span>
		    @endif
		    </button>
		</span>
	</div>
	<div class="modal fade" id="folder-details-{{ $folder->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
	    	<div class="modal-content">
	        	<div class="modal-body p-0">
					<div class="card bg-secondary shadow border-0">
						<div class="card-header bg-secondary text-center">
							<h3><i class="fa fa-{{ $folder->icon }}"></i>&nbsp;&nbsp;&nbsp;{{ $folder->name }} Folder</h3>
						</div>
					    <div class="card-body">
					    	<div class="row">
					    		@if($folder->password == null)
					    		<div class="col-md-6">
						            <div class="text-center">
						            	<form action="{{ route('folder.view.accounts') }}" method="POST">
						            		@csrf
						            		<input type="hidden" name="id" value="{{ $folder->id }}">
						                	<button type="submit" class="btn btn-default btn-block my-5"><i class="ni ni-folder-17"></i> Open Folder</button>
						                </form>
						            </div>
							    </div>
							    <div class="vl text-primary"></div>
							    <div class="col-md-5 text-center">
							    	<form role="form" method="POST" action="{{ url('/accounts/folder/'.$folder->id.'/password') }}">
							        	@csrf
							            <div class="form-group ">
							                <div class="input-group input-group-alternative">
							                    <div class="input-group-prepend">
							                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
							                    </div>
							                    <input class="form-control" placeholder="Add Password" type="password" name="password" id="password" required="">
							                </div>
							                <button type="submit" class="btn btn-primary btn-sm my-4">Add Password</button>
							            </div>
							        </form>
							    </div>
							    @else
							    <div class="col-md-12 text-center">
							    	<form role="form" method="POST" action="{{ route('folder.view.accounts') }}">
							        	@csrf
							            <div class="form-group ">
							                <div class="input-group input-group-alternative">
							                    <div class="input-group-prepend">
							                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
							                    </div>
							                    <input type="hidden" name="id" value="{{ $folder->id }}">
							                    <input class="form-control" placeholder="Enter password to access folder" type="password" name="password" id="password" required="">
							                </div>
							                <button type="submit" class="btn btn-primary my-4"><i class="ni ni-folder-17"></i> Open Folder</button>
							            </div>
							        </form>
							    </div>
							    @endif
							</div>
					    </div>
					    <div class="card-footer">
					    	<small><i class="badge badge-danger"><b>Note</b></i> Accounts added to a password protected folder can only be accessed through that folder - cannot be searched for using global search bar.</small>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
@endif
<hr>
<button class="btn btn-icon btn-secondary btn-block" type="button" data-toggle="modal" data-target="#export-accounts">
  <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
  <span class="btn-inner--text">Export All Accounts</span>
</button>
<br/>
