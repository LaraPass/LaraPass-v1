@extends('install.layouts.master')

@section('title')
Setup Database
@endsection

@section('content')
<div class="tabs is-fullwidth">
  <ul>
    <li>
      <a>
        <span><i class="fa fa-check-circle"></i> Requirements</span>
      </a>
    </li>
    <li>
      <a>
        <span><i class="fa fa-check-circle"></i> License</span>
      </a>
    </li>
    <li>
      <a>
        <span><i class="fa fa-check-circle"></i><b> Database</b></span>
      </a>
    </li>
    <li class="is-active">
      <a>
        <span><i  class="fa fa-check-circle"></i><b>Finish</b></span>
      </a>
    </li>
  </ul>
</div>
<div class="notification is-success"><strong>Congratulations!</strong> Your LaraPass App is now live.</div>
<div class="notification is-warning"><strong>Default Admin Details</strong>
  <br/><b>Username: </b>admin
  <br/><b>Password: </b>larapass@admin
</div>
<div style='text-align: right;'>
  <a href="{{ url('/') }}" class="button is-link">Open my App</a>
</div>
@endsection