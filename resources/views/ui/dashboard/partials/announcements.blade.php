<div class="col-xl-4 mb-5 mb-xl-0">
  <div class="card shadow pull-up">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Latest Announcements</h3>
        </div>
      </div>
    </div>
    <div class="card-body bg-secondary">
      <!-- Projects table -->
      <ul class="todo-list ui-sortable bg-primary">
        <li>
          <blockquote class="blockquote text-left">
            <h4 >{{ setting()->get('app_announcement') }}</h4>
            <footer class="blockquote-footer"><small>{{ \Carbon\Carbon::parse(Setting::get('app_announcement_at'))->diffForHumans() }}</small></footer>
          </blockquote>
        </li>
      </ul>
    </div>
  </div>
</div>