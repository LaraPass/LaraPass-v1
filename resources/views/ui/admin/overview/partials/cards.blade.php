<div class="row">
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Registered Today</h5>
            <span class="h2 font-weight-bold mb-0">{{ App\User::whereDate('created_at','=',date('Y-m-d'))->count() }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-danger icon-sm text-white rounded-circle shadow">
              <i class="fas fa-chart-bar"></i>
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
            <h5 class="card-title text-uppercase text-muted mb-0">Total Users</h5>
            <span class="h2 font-weight-bold mb-0">{{ App\User::where(['status' => 'Active'])->count() }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-warning icon-sm text-white rounded-circle shadow">
              <i class="fas fa-users"></i>
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
            <h5 class="card-title text-uppercase text-muted mb-0">Total Accounts</h5>
            <span class="h2 font-weight-bold mb-0">{{ App\Account::all()->count() }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-yellow icon-sm text-white rounded-circle shadow">
              <i class="fas fa-tasks"></i>
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
            <h5 class="card-title text-uppercase text-muted mb-0">Total Folders</h5>
            <span class="h2 font-weight-bold mb-0">{{ App\Folder::all()->count() }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-primary icon-sm text-white rounded-circle shadow">
              <i class="ni ni-folder-17"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>