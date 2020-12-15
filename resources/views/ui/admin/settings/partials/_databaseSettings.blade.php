<div class="modal fade" id="database_settings" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <h2>Database Settings</h2>
                    </div>
                    <form role="form" method="POST" action="{{ route('updateDatabase') }}">
                      @csrf
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="db_default_type">Database Type (Larapass currently only supports mysql)</label>
                              <input type="text" id="db_default_type" name="db_default_type" class="form-control form-control-alternative" value="{{ Setting::get('db_default_type') }}" readonly="">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="db_mysql_host">Database Host</label>
                              <input type="text" id="db_mysql_host" name="db_mysql_host" placeholder="Database Hostname (localhost, etc)" class="form-control form-control-alternative" value="{{ Setting::get('db_mysql_host') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="db_mysql_port">Database Port</label>
                              <input type="text" id="db_mysql_port" name="db_mysql_port" class="form-control form-control-alternative" placeholder="Database Port No. (3306, etc)" value="{{ Setting::get('db_mysql_port') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="db_mysql_database">Database Name</label>
                              <input type="text" id="db_mysql_database" name="db_mysql_database" class="form-control form-control-alternative" placeholder="Name of your database (larapass, etc)" value="{{ Setting::get('db_mysql_database') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="db_mysql_username">Database Username</label>
                              <input type="text" id="db_mysql_username" name="db_mysql_username" class="form-control form-control-alternative" placeholder="Privileged user that has access to this database" value="{{ Setting::get('db_mysql_username') }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="db_mysql_password">Database Password</label>
                              <input type="text" id="db_mysql_password" name="db_mysql_password" class="form-control form-control-alternative" placeholder="Password for the Database" value="{{ Setting::get('db_mysql_password') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="text-center">
                              <button type="submit" class="btn btn-secondary my-4">Update Database Settings</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>