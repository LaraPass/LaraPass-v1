@extends('install.layouts.master')

@section('title')
Setup Database
@endsection

@section('content')
<div class="tabs is-fullwidth">
  <ul>
    <li>
      <a>
        <span><i class="fa fa-check-circle"></i><b> Requirements</b></span>
      </a>
    </li>
    <li>
    <li>
      <a>
          <span><i class="fa fa-check-circle"></i><b> Environment</b></span>
      </a>
    </li>
    <li class="is-active">
      <a>
        <span><b> Database</b></span>
      </a>
    </li>
    <li>
      <a>
        <span> Finish</span>
      </a>
    </li>
  </ul>
</div>
<form action="{{ url('/admin/install/step2confirm') }}" method="POST">
  @csrf
  @include('install.partials.alerts')
  <div style='text-align: right;'>
    <button type="submit" class="button is-link">Migrate DB Files</button>
  </div>
</form>
<form method="GET" action="{{ url('/admin/install/step1') }}">
  @csrf
  <div style='text-align: left;'>
    <button type="submit" class="button text-white is-warning">Go Back & Change DB Details</button>
  </div>
</form>
@endsection