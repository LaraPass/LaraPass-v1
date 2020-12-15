<div class="card bg-secondary shadow pull-up">
  <div class="card-header bg-white border-0">
    <div class="row align-items-center">
      <div class="col-8">
        <h3 class="mb-0">Make an Announcement</h3>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form role="form" method="POST" action="{{ route('makeAnnouncement') }}">
      @csrf
      <div class="pl-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="app_ip">Message on Dashboard <span data-toggle="tooltip" data-placement="right" title="Adding new announcement will replace the previous one with the new one"><i class="fas fa-question-circle"></i></span></label>
              <input type="text" id="app_announcement" name="app_announcement" class="form-control form-control-alternative" placeholder="{{ setting()->get('app_announcement') }}" required="">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Make Announcement</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>