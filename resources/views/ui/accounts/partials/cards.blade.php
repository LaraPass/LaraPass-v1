<div class="row">
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Accounts</h5>
            <span class="h2 font-weight-bold mb-0">{{ Auth::user()->totalAccounts() }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
              <i class="fas fa-hdd-o"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Folders</h5>
            <span class="h2 font-weight-bold mb-0">{{ Auth::user()->totalFolders() }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
              <i class="fas fa-folder"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Notes</h5>
            <span class="h2 font-weight-bold mb-0">{{ Auth::user()->totalNotes() }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
              <i class="fas fa-sticky-note"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Membership</h5>
            <span class="h2 font-weight-bold mb-0">{{ Setting::get('app_default_membership') }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
              <i class="fas fa-shopping-cart"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>