<div class="card bg-secondary shadow pull-up">
  <div class="card-header bg-white border-0">
    <div class="row align-items-center">
      @if(setting()->get('app_mode')=="PUBLIC")
      <div class="col-8">
        <h3 class="mb-0">Access Mode
         <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Your Application Is Accessible By Everyone">{{ setting()->get('app_mode') }}</button>
        </h3>
      </div>
      <div class="col-4 text-right">
        <form method="POST" action="{{ route('accessMode') }}">
          @csrf
          <input type="hidden" name="mode" value="PRIVATE">
          <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Only Admin Can Register New Users in Private Mode">Switch to PRIVATE</button>
        </form>
      </div>
      @else
      <div class="col-8">
        <h3 class="mb-0">Access Mode
         <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Your Application is Limited to Registered Users Only">{{ setting()->get('app_mode') }}</button>
        </h3>
      </div>
      <div class="col-4 text-right">
        <form method="POST" action="{{ route('accessMode') }}">
          @csrf
          <input type="hidden" name="mode" value="PUBLIC">
          <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Open Registrations for Everyone">Switch to PUBLIC</button>
        </form>
      </div>
      @endif
    </div>
  </div>
</div>