<div class="modal fade" id="two-step-remove" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <h2 align="center" class="text-danger"><strong>Are you sure you want to disable <a href="">2-Step Authentication</a> ?</strong></h2>
            </div>
            <form role="form" method="POST" action="{{ route('deactivate2FA') }}">
              @csrf
                <div class="form-group mb-3">
                    <select name="disable" id="disable" class="form-control form-control-alternative" required="">
                      <option value="" selected disabled="">Select Yes if you want to disable 2-Step Authentication</option>
                      <option value="1">Yes</option>
                    </select>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <input class="form-control" placeholder="Enter your current password" type="password" name="password" id="password" required="">
                    </div>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <input class="form-control" placeholder="Enter your 2-Step Authentication Code" type="text" name="code" id="code" required="">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger my-4">Disable 2-Step</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>