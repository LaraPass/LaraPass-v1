<div class="card bg-secondary shadow pull-up">
  <div class="card-header bg-white border-0">
    <div class="row align-items-center">
      <div class="col-8">
        <h3 class="mb-0">Laravel Shortcuts</h3>
      </div>
      <div class="col-4 text-right">
        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Laravel Framework Version">5.7</button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="pl-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <a href="{{ route('clearCache') }}" class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="top" title="Clear System Cache">PHP ARTISAN CACHE:CLEAR</a>
          <a href="{{ route('clearView') }}" class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="top" title="Clear View Cache">PHP ARTISAN VIEW:CLEAR</a>
          <a href="{{ route('clearRoute') }}" class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="top" title="Clear Route Cache">PHP ARTISAN ROUTE:CLEAR</a>
          <a href="{{ route('clearConfig') }}" class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="top" title="Clear Config Cache">PHP ARTISAN CONFIG:CLEAR</a>
          <a href="{{ route('clearCompiled') }}" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="top" title="Clear Compiled FIles">PHP ARTISAN CLEAR-COMPILED</a>
        </div>
      </div>
    </div>
  </div>
</div>  