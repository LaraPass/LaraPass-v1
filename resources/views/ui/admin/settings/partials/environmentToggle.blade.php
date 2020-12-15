<div class="card bg-secondary shadow pull-up">
  <div class="card-header bg-white border-0">
    <div class="row align-items-center">
      <div class="col-8">
        <h3 class="mb-0">Application Environment</h3>
      </div>
      <div class="col-4 text-right">
        @if(setting()->get('app_env')=="production")
        <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Your Application is in Production Mode">{{ setting()->get('app_env') }}</button>
        @else
        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Your Application is in Local Development Mode">{{ setting()->get('app_env') }}</button>
        @endif
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="pl-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            @if(setting()->get('app_env')=="production")
            <a class="btn btn-danger btn-block" href="{{ route('goLocal') }}">Switch to Local Development Mode</a>
            @elseif(setting()->get('app_env')=="local")
            <a class="btn btn-success btn-block" href="{{ route('goProduction') }}">Switch to Production Mode</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <span class="badge badge-pill badge-danger">Note</span> 
    <small>Local Mode is ideal for testing and developing the app. DO NOT set Application Environment to Local Development Mode while in Production as it will expose sensitive variables in the app (usually required when debugging).</small>
  </div>
</div>