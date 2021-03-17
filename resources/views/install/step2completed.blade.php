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
        <span><i class="fa fa-check-circle"></i> Environment</span>
      </a>
    </li>
    <li class="is-active">
      <a>
        <span><i class="fa fa-check-circle"></i><b> Database</b></span>
      </a>
    </li>
    <li>
      <a>
        <span> Finish</span>
      </a>
    </li>
  </ul>
</div>
<form action="{{ url('/admin/install/step3') }}" method="POST">
  @csrf
  <div class="notification is-success"><strong>{{ $response['message'] }}</strong></div>
  <div class="notification is-warning"><strong>{{ $response['dbOutputLog'] }}</strong></div>
  <div style='text-align: right;'>
    <button type="submit" class="button is-link">Finalize</button>
  </div>
</form>
@endsection