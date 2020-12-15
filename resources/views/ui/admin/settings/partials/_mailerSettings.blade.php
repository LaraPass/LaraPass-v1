<div class="modal fade" id="mailer_settings" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <h2>Mailer Settings</h2>
                    </div>
                    <form role="form" method="POST" action="{{ route('updateMailer') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="app_mail_driver">Mail Driver</label>
                              <input type="text" id="app_mail_driver" name="app_mail_driver" placeholder="Your Mail Driver (smtp, mailgun, etc)" class="form-control form-control-alternative" value="{{ Setting::get('app_mail_driver') }}" required="">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="app_mail_host">Mail Host </label>
                              <input type="text" id="app_mail_host" name="app_mail_host" placeholder="Mail Host (ex: smtp.mailgun.com)" class="form-control form-control-alternative" value="{{ Setting::get('app_mail_host') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="app_mail_port">Mail Port</label>
                              <input type="text" id="app_mail_port" name="app_mail_port" class="form-control form-control-alternative" placeholder="Mail Port No. (587, etc)"value="{{ Setting::get('app_mail_port') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="app_mail_encryption">Mail Encryption</label>
                              <input type="text" id="app_mail_encryption" name="app_mail_encryption" class="form-control form-control-alternative" placeholder="Mailer Encryption (ex: tls)"value="{{ Setting::get('app_mail_encryption') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="app_mail_username">Mail Username</label>
                              <input type="text" id="app_mail_username" name="app_mail_username" class="form-control form-control-alternative" placeholder="Login Username for your Mailer (if using SMTP)"value="{{ Setting::get('app_mail_username') }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="app_mail_password">Mail Password</label>
                              <input type="text" id="app_mail_password" name="app_mail_password" class="form-control form-control-alternative" placeholder="Login Password for your Mailer (if using SMTP)"value="{{ Setting::get('app_mail_password') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="app_mail_sender">Mail Sender Address</label>
                              <input type="text" id="app_mail_sender" name="app_mail_sender" class="form-control form-control-alternative" placeholder="Transactional Mail Sender Address (ex: no-reply@yourdomain.com)"value="{{ Setting::get('app_mail_sender') }}" required="">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="app_mail_sender_name">Mail Sender Name</label>
                              <input type="text" id="app_mail_sender_name" name="app_mail_sender_name" class="form-control form-control-alternative" placeholder="Transactional Mail Sender Name (ex: LaraPass Support)"value="{{ Setting::get('app_mail_sender_name') }}" required="">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="mailgun_domain">Mailgun Domain (if using Mailgun API)</label>
                              <input type="text" id="mailgun_domain" name="mailgun_domain" class="form-control form-control-alternative" placeholder="Add your mailgun domain (ex: mailgun.yourdomain.com)"value="{{ Setting::get('mailgun_domain') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="mailgun_secret">Mailgun Secret Key (if using Mailgun API)</label>
                              <input type="text" id="mailgun_secret" name="mailgun_secret" class="form-control form-control-alternative" placeholder="Add your Mailgun Secret Key"value="{{ Setting::get('mailgun_secret') }}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="text-center">
                              <button type="submit" class="btn btn-warning my-4">Update Mailer Settings</button>
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