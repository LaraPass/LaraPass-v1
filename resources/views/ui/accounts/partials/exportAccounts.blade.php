<div class="modal fade" id="export-accounts" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <h2 align="center" class="text-danger"><strong>Are you sure you want to decrypt & export all accounts ? </strong></h2>
            </div>
            <form role="form" method="POST" action="{{ route('exportAccounts') }}">
              @csrf
                <div class="form-group mb-3">
                    <select name="export" id="export" class="form-control form-control-alternative" required="">
                      <option value="" selected disabled="">Select Yes if you want to export all accounts</option>
                      <option value="1">Yes</option>
                    </select>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <input class="form-control" placeholder="Enter your current password" type="password" name="password" id="password" required="">
                    </div>
                </div>
                @if(Auth::user()->two_step)
                <hr>
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <input class="form-control" placeholder="Enter your 2-Step Authentication Code" type="text" name="code" id="code" required="">
                    </div>
                </div>
                @endif
                <div class="text-center">
                    <button type="submit" class="btn btn-danger my-4">Download Accounts</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>