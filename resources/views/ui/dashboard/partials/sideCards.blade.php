<div class="col-xl-4">
  <div class="card bg-secondary card-stats mb-4 mb-xl-0 pull-up">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Server Clock</h5>
          <span class="h2 font-weight-bold mb-0"><span text-size="17" id="clock"></span></span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
            <i class="fas fa-clock"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br/>
  <div class="card bg-secondary card-stats mb-4 mb-xl-0 pull-up">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Last Login IP</h5>
          <span class="h4 font-weight-bold mb-0"><a style="color:black" target="_blank" href="http://whatismyipaddress.com/ip/{{ auth()->user()->previousLoginIp() }}"> {{ auth()->user()->previousLoginIp() }}</a></span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
            <i class="fas fa-server"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br/>
  <div class="card bg-secondary card-stats mb-4 mb-xl-0 pull-up">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Last Logged In</h5>
          <span class="h4 font-weight-bold mb-0">@if(auth()->user()->previousLoginAt()) {{ auth()->user()->previousLoginAt()->diffForHumans() }} @endif</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-info text-white rounded-circle shadow">
            <i class="fas fa-calendar"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>