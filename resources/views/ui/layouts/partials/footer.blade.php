<footer class="footer">
  @if(Auth::user()->delete_on)
   @include('ui.partials.deletion')
  @endif
  <div class="row align-items-center justify-content-xl-between">
    <div class="col-xl-6">
      <div class="copyright text-center text-xl-left text-muted">
       2018-20 &copy;<a href="{{ url('/') }}" class="font-weight-bold ml-1" target="_blank">{{ Setting::get('app_name') }} </a><small>v{{ Setting::get('app_version') }}</small>
      </div>
    </div>
    <div class="col-xl-6">
      <ul class="nav nav-footer justify-content-center justify-content-xl-end">
        <li class="nav-item">
          <a href="{{ Setting::get('app_about') }}" class="nav-link" target="_blank">About Us</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('privacy') }}" class="nav-link" target="_blank">Privacy Policy</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('terms') }}" class="nav-link" target="_blank">Terms of Service</a>
        </li> 
      </ul>
    </div>
  </div>
</footer>