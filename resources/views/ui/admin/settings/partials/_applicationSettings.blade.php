<div class="modal fade" id="app_settings" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-4">
                      <h2>Application Settings</h2>
                  </div>
                  <form role="form" method="POST" action="{{ route('updateSettings') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_name">Application Name</label>
                            <input type="text" id="app_name" name="app_name" placeholder="Enter Your Application Name" class="form-control form-control-alternative" value="{{ Setting::get('app_name') }}" required="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_url">Application URL</label>
                            <input type="text" id="app_url" name="app_url" placeholder="Enter Your Application URL Address" class="form-control form-control-alternative" value="{{ Setting::get('app_url') }}" required="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_description">Application Description </label>
                            <input type="text" id="app_description" name="app_description" placeholder="A few words describing your app" class="form-control form-control-alternative" value="{{ Setting::get('app_description') }}" required="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_email">Application Email</label>
                            <input type="text" id="app_email" name="app_email" class="form-control form-control-alternative" placeholder="Email Address for receiving support Emails."value="{{ Setting::get('app_email') }}" required="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_mail_sender">Application Email Sender (for Transactional Mails)</label>
                            <input type="text" id="app_mail_sender" name="app_mail_sender" class="form-control form-control-alternative" placeholder="no-reply@yourapp.com"value="{{ Setting::get('app_mail_sender') }}" required="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_mail_sender_name">Application Email Sender Name (for Transactional Mails)</label>
                            <input type="text" id="app_mail_sender_name" name="app_mail_sender_name" class="form-control form-control-alternative" placeholder="Sender Name for the Email (Ex: LaraPass Support)" value="{{ Setting::get('app_mail_sender_name') }}" required="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_default_membership">Default Membership Title</label>
                            <input type="text" id="app_default_membership" name="app_default_membership" class="form-control form-control-alternative" value="{{ Setting::get('app_default_membership') }}" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="recaptcha_site_key">Google reCaptcha Site Key</label>
                            <input type="text" id="recaptcha_site_key" name="recaptcha_site_key" class="form-control form-control-alternative" value="{{ Setting::get('recaptcha_site_key') }}" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="recaptcha_secret_key">Google reCaptcha Secret Key</label>
                            <input type="text" id="recaptcha_secret_key" name="recaptcha_secret_key" class="form-control form-control-alternative" value="{{ Setting::get('recaptcha_secret_key') }}" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_logo">Main Logo (Colored) [Recommended 487 x 144px]</label>
                            <input type="file" id="app_logo" name="app_logo" class="form-control form-control-alternative">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_logo_white">White Logo [Recommended 487 x 144px]</label>
                            <input type="file" id="app_logo_white" name="app_logo_white" class="form-control form-control-alternative">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_favicon">Favicon [Recommended 32 x 32px]</label>
                            <input type="file" id="app_favicon" name="app_favicon" class="form-control form-control-alternative">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_about">About Us Page Link (Full URL)</label>
                            <input type="text" id="app_about" name="app_about" class="form-control form-control-alternative" placeholder="http://yourapp.com/about-us"value="{{ Setting::get('app_about') }}" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_terms">Terms of Service Page Link (default or external url)</label>
                            <input type="text" id="app_terms" name="app_terms" class="form-control form-control-alternative" placeholder="{{ route('terms') }}"value="{{ Setting::get('app_terms') }}" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="app_privacy">Privacy Policy Page Link (default or external url)</label>
                            <input type="text" id="app_privacy" name="app_privacy" class="form-control form-control-alternative" placeholder="http://yourapp.com/privacy"value="{{ Setting::get('app_privacy') }}" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-success my-4">Update Application</button>
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