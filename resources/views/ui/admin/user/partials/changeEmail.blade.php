<div class="modal fade" id="change-email" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <h2 align="center" class="text-warning"><strong>Change <a href="#">{{ $user->username }}'s</a> Email ?</strong></h2>
            </div>
            <form role="form" method="POST" action="{{ url('/admin/user/'.$user->id.'/email') }}">
              @csrf
                <div class="form-group mb-3">
                    <select name="change" id="change" class="form-control form-control-alternative" required="">
                      <option value="" selected disabled="">Select Yes if you want to change Email Address</option>
                      <option value="1">Yes</option>
                    </select>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <input class="form-control" placeholder="Enter {{ $user->username }}'s Support PIN" type="text" name="pin" id="pin" required="">
                    </div>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <input class="form-control" placeholder="New Email Address" type="text" name="email" id="email" required="">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning my-4">Reset Email</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>