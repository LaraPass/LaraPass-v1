<div class="card bg-secondary shadow pull-up">
  <div class="card-header bg-white border-0">
    <div class="row align-items-center">
      <div class="col-8">
        <h3 class="mb-0">Account Categories</h3>
      </div>
      <div class="col-4 text-right">
        <button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Total Categories">{{ $categories->count() }}</button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="pl-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            <form method="GET" action="{{ route('showCategories') }}">
              @csrf
              <input type="hidden" name="status" value="1">
              <button type="submit" class="btn btn-default btn-block">View / Modify Categories</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>