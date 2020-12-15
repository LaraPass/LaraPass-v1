<ul class="nav align-items-center d-md-none">
  <li class="nav-item dropdown">
    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="media align-items-center">
        <span class="avatar avatar-sm rounded-circle">
          <img alt="Profile Picture" src="{{ asset('ui/img/profile/'.auth()->user()->avatar) }}">
        </span>
      </div>
    </a>
    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
      <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Welcome!</h6>
      </div>
      <a href="{{ route('profile') }}" class="dropdown-item">
        <i class="ni ni-single-02"></i>
        <span>My profile</span>
      </a>
      <a href="{{ route('security') }}" class="dropdown-item">
        <i class="ni ni-settings-gear-65"></i>
        <span>Security Settings</span>
      </a>
      <a href="{{ route('contact') }}" class="dropdown-item">
        <i class="ni ni-support-16"></i>
        <span>Support</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ route('logout') }}" class="dropdown-item">
        <i class="ni ni-user-run"></i>
        <span>Logout</span>
      </a>
    </div>
  </li>
</ul>