<div class="card bg-secondary shadow pull-up">
  <div class="card-header bg-white border-0">
    <div class="row align-items-center">
      <div class="col-8">
        <h3 class="mb-0">Maintenance Mode</h3>
      </div>
      <div class="col-4 text-right">
        @if(! app()->isDownForMaintenance())
        <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Your Application is Live">Live</button>
        @else
        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Your Application is Down for Maintenance">Down</button>
        @endif
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="pl-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            @if(! app()->isDownForMaintenance())
            <button type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#goDown">Activate Maintenance Mode</button>
            @else
            <form method="POST" action="{{ route('goLive') }}">
              @csrf
              <input type="hidden" name="status" value="1">
              <button type="submit" class="btn btn-danger btn-block">Deactivate Maintenance Mode</button>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>