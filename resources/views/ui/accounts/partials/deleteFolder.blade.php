<div class="modal fade" id="delete-folder" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <h1 align="center" class="text-danger"><strong>Are you sure you want to delete this folder?</strong></h1>
            </div>
            <form role="form" method="POST" action="{{ url('/accounts/folder/'.$folder->id.'/delete') }}">
              @csrf
            	<input type="hidden" name="_method" value="DELETE">
                <div class="form-group mb-3">
                    <select name="delete" id="delete" class="form-control form-control-alternative" required="">
                      <option value="" selected disabled="">Select Yes if you want to delete the folder</option>
                      <option value="1">Yes</option>
                    </select>
                </div>
                <hr>
                @if($folder->password)
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <input class="form-control" placeholder="Enter Your Folder Password" type="password" name="folder_password" id="folder_password" required="">
                    </div>
                </div>
                <hr>
                @endif
                <div class="form-group mb-3">
                    <select name="delete_accounts" id="delete_accounts" class="form-control form-control-alternative" required="">
                      <option value="" selected disabled="">Do you want to delete all the accounts in this folder?</option>
                      <option value="0">No, Do Not Delete Any Account</option>
                      <option value="1">Yes, Delete All The Accounts In This Folder Permanantly</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger my-4">Yes, Delete Folder</button>
                </div>
            </form>
          </div>
          <div class="card-footer">
          	<small><span class="badge badge-danger">Warning</span> This action cannot be reversed. Be sure you are ready to delete this folder permanantly?</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>