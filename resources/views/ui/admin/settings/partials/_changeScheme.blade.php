<div class="modal fade" id="changeScheme" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                    <h2>Change Background Scheme</h2>
                </div>

                <form role="form" method="POST" action="{{ route('changeScheme') }}">
                  @csrf
                    <div class="text-muted font-italic"><small>You can change the background header scheme for the loign/register and the inner pages (independently) using the options below:</small> 
                    </div>
                    <br/>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" id="page_background_login" for="app_name">Login Page Background Scheme</label>
                          <input class="form-control" type="color" value="{{ setting()->get('page_background_login') }}" id="page_background_login" name="page_background_login">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="page_background_inner">Inner Pages Background Scheme</label>
                          <input class="form-control" type="color" value="{{ setting()->get('page_background_inner') }}" id="page_background_inner" name="page_background_inner">
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Change Scheme</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>