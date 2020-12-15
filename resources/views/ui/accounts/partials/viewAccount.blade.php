 <div class="modal fade" id="modal-view{{$account->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content bg-secondary shadow">
        	
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">{{ $account->title }}
                	<small class="text-muted">
		                        ( {{ $account->category->name }} )
		                    </small></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
             
            <div class="modal-body">
		        <h4>
		        	<div class="row">
			          	<div class="col-md-4 pull-text-right">Login Link  </div>
			          	<div class="col-md-8">
			          		<div style="float: left; display: inline; width: 265px; word-break: break-all; word-wrap: break-word;">
			          			<a href="{{ $account->link }}" target="_blank">{{ $account->link }}</a>
			          		</div>
			          	</div>
		      		</div>
		        </h4> 
		        <hr> 
		        <h4>
		          	<div class="row">
			          	<div class="col-md-4">Login ID  </div>
	          			<div class="col-md-8">
	          				<div style="float: left; display: inline; width: 265px; word-break: break-all; word-wrap: break-word;">
	          					<span id="login_{{ $account->id }}">{{ $account->login_id }}</span>
	          					<button type="button" class="btn btn-success btn-sm" name="btn" id="btn" data-clipboard-target="#login_{{ $account->id }}">Copy</button>
	          				</div>
	          			</div>
	          		</div>
		        </h4> 
		        <hr> 
		        <h4>
		        	<div class="row">
		          		<div class="col-md-4">Login Password  </div>
	          			<div class="col-md-8">
	          				<div style="float: left; display: inline; width: 265px; word-break: break-all; word-wrap: break-word;">
		            			<span id="password_{{ $account->id }}">{{ $account->login_password }}</span>
	          					<button class="btn btn-success btn-sm" name="btn" id="btn" data-clipboard-target="#password_{{ $account->id }}">Copy</button>
	          				</div>
	          			</div>
	          		</div>
	          	</h4>
		      </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
            </div>
            
        </div>
    </div>
</div>