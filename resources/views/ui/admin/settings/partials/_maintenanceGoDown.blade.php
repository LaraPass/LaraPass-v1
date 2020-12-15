<div class="modal fade" id="goDown" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                    <h2>Activate Maintenance Mode</h2>
                </div>
                <form role="form" method="POST" action="{{ route('goDown') }}">
                  @csrf
                    <div class="text-muted font-italic"><small>Your IP Address: <span class="text-success font-weight-700" id="ip_current"> {{ \Request::ip() }}</span> will automatically be added to the Whitelist so that you can access the app while its down for Maintenance.</small> 
                    </div>
                    <br/>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-comment"></i></span>
                            </div>
                            <input class="form-control" placeholder="Enter Message (to display to users)"  type="text" name="message" id="message" >
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success my-4">Activate Maintenance Mode</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>