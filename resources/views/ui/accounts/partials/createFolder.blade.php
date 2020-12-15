<div class="modal fade" id="create-folder" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
        	<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
				    <div class="card-body px-lg-5 py-lg-5">
				        <div class="text-center text-muted mb-4">
				            <small>Create a New Folder</small>
				        </div>
				        <form role="form" method="POST" action="{{ route('createFolder') }}">
				        	@csrf
				        	<div class="form-group mb-3">
			                    <select class="selectpicker" id="icon" name="icon" required="">
			                      <option data-icon="fa fa-folder" selected="" value="folder"> Folder</option>
			                      <option data-icon="fa fa-amazon" value="amazon"> Amazon</option>
			                      <option data-icon="fa fa-address-book" value="address-book"> Address Book</option>
			                      <option data-icon="fa fa-envelope-open" value="envelope-open"> Envelope Open</option>
			                      <option data-icon="fa fa-id-card" value="id-card"> ID Card</option>
			                      <option data-icon="fa fa-user" value="user"> User</option>
			                      <option data-icon="fa fa-group" value="group"> Group</option>
			                      <option data-icon="fa fa-archive" value="archive"> Archive</option>
			                      <option data-icon="fa fa-bank" value="bank"> Bank</option>
			                      <option data-icon="fa fa-ban" value="ban"> Ban</option>
			                      <option data-icon="fa fa-cc" value="cc"> CC</option>
			                      <option data-icon="fa fa-child" value="child"> Child</option>
			                      <option data-icon="fa fa-code-fork" value="code-fork"> Code Fork</option>
			                      <option data-icon="fa fa-cloud" value="cloud"> Cloud</option>
			                      <option data-icon="fa fa-cloud-upload" value="cloud-upload"> Cloud Upload</option>
			                      <option data-icon="fa fa-cloud-download" value="cloud-download"> Cloud Download</option>
			                      <option data-icon="fa fa-credit-card" value="credit-card"> Credit Card</option>
			                      <option data-icon="fa fa-database" value="database" Database</option>
			                      <option data-icon="fa fa-download" value="download"> Download</option>
			                      <option data-icon="fa fa-desktop" value="desktop"> Desktop</option>
			                      <option data-icon="fa fa-flag" value="flag"> Flag</option>
			                      <option data-icon="fa fa-gift" value="gift"> Gift</option>
			                      <option data-icon="fa fa-heartbeat" value="heartbeat"> Heartbeat</option>
			                      <option data-icon="fa fa-hashtag" value="hashtag"> Hashtag</option>
			                      <option data-icon="fa fa-hdd-o" value="hdd-o"> Hdd-o</option>
			                      <option data-icon="fa fa-flag" value="flag"> Flag</option>
			                      <option data-icon="fa fa-home" value="home"> Home</option>
			                      <option data-icon="fa fa-info" value="info"> Info</option>
			                      <option data-icon="fa fa-institution" value="institution"> Institution</option>
			                      <option data-icon="fa fa-legal" value="legal"> Legal</option>
			                      <option data-icon="fa fa-language" value="language"> Language</option>
			                    </select>
			                </div>
				            <div class="form-group mb-3">
				                <div class="input-group input-group-alternative">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="ni ni-folder-17"></i></span>
				                    </div>
				                    <input class="form-control" placeholder="Folder Name" type="text" name="name" id="name" required="">
				                </div>
				            </div>
				            <div class="text-center">
				                <button type="submit" class="btn btn-info my-4">Create Folder</button>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>