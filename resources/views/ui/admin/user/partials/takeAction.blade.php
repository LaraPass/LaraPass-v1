<div class="modal fade" id="take-action" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <h2 align="center" class="text-danger"><strong>Take Action Against <a href="#">{{ $user->username }}</a></strong></h2>
            </div>
            <form role="form" method="POST" action="{{ url('/admin/user/'.$user->id.'/action') }}">
              @csrf
                <div class="form-group mb-3">
                    <select name="take" id="take" class="form-control form-control-alternative" required="">
                      <option value="" selected disabled="">Select Yes if you are absolutely sure about taking action</option>
                      <option value="1">Yes</option>
                    </select>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <select class="form-control" name="action" id="action" required="">
                              <option value="" selected="" disabled="">Select type of Action</option>
                              <option value="Banned">Ban User</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <input class="form-control" placeholder="Remark" type="text" name="remark" id="remark" required="">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger my-4">Take Action</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>