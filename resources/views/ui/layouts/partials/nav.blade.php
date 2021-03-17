<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link @yield('nav_dashboard')" href="{{ route('dashboard') }}">
      <i class="ni ni-tv-2 text-primary"></i> Dashboard
    </a>
  </li>
</ul>
<hr class="my-3">
<h6 class="navbar-heading text-muted">Vault</h6>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link @yield('nav_accounts')" href="{{ route('accounts') }}">
      <i class="ni ni-collection text-green"></i> Accounts
    </a>
  </li>
</ul>
<hr class="my-3">
<h6 class="navbar-heading text-muted">Personal</h6>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link @yield('nav_profile')" href="{{ route('profile') }}">
      <i class="ni ni-circle-08 text-yellow"></i> Profile
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link @yield('nav_security')" href="{{ route('security') }}">
      <i class="ni ni-badge text-orange"></i> Security
    </a>
  </li>
</ul>
@if(auth()->user()->isAdmin())
<hr class="my-3">
<h6 class="navbar-heading text-muted">Admin Secured</h6>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link @yield('nav_overview')" href="{{ route('overview') }}">
      <i class="fab fa-autoprefixer text-default"></i> Overview
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link @yield('nav_settings')" href="{{ route('adminSettings') }}">
      <i class="fa fa-cog text-pink"></i> Settings
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link @yield('nav_manager')" href="{{ route('manager') }}" >
      <i class="fa fa-tasks text-info"></i> Manager
    </a>
  </li>
</ul>
@endif
<hr class="my-3">
<h6 class="navbar-heading text-muted">Support</h6>
<ul class="navbar-nav">
  @if(setting()->get('app_changelog'))
  <li class="nav-item">
    <a class="nav-link @yield('nav_changelog')" href="{{ route('changelog') }}">
      <i class="ni ni-bullet-list-67"></i> Changelog
    </a>
  </li>
  @endif
  <li class="nav-item">
    <a class="nav-link @yield('nav_contact')" href="{{ route('contact') }}">
      <i class="fa fa-life-ring"></i> Contact Us
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}">
      <i class="ni ni-circle-08"></i> Logout
    </a>
  </li>
</ul>