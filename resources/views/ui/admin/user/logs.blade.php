@extends('ui.layouts.master')

@section('title')
Login Logs for {{ Auth::user()->username }}
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('overview') }}"><i class="fab fa-autoprefixer"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('overview') }}">USERS</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/user/'.$user->id) }}"><u>{{ strtoupper($user->username) }}</u></a></li>
    <li class="breadcrumb-item active" aria-current="page">LOGS</li>
  </ol>
</nav>
@endsection

@section('nav_overview')
active
@endsection

@section('content')
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <h3 class="mb-0">{ {{ $user->username }} } Login IP Logs</h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Logged In</th>
                <th scope="col">IP Used</th>
                <th scope="col">User Agent</th>
              </tr>
            </thead>
            <tbody>
              @foreach($iplogs as $iplog)
              <tr>
                <td>
                  {{ \Carbon\Carbon::parse($iplog->login_at)->diffForHumans() }}
                </td>
                <td>
                  {{ $iplog->ip_address }}
                </td>
                <td>
                    {{ $iplog->user_agent }}
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5">
                  <div class="text-right">
                    <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  @if(! $deletionLogs->isEmpty())
  <hr/>
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <h3 class="mb-0">{ {{ $user->username }} } Mark for Deletion Records</h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Action</th>
                <th scope="col">Marked On</th>
                <th scope="col">IP Used</th>
                <th scope="col">User Agent</th>
              </tr>
            </thead>
            <tbody>
              @foreach($deletionLogs as $log)
              <tr>
                <td>
                  {{ $log->action }}
                </td>
                <td>
                  {{ \Carbon\Carbon::parse($log->login_at)->format('Y-m-d') }}
                </td>
                <td>
                  {{ $log->ip_address }}
                </td>
                <td>
                    {{ $log->user_agent }}
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5">
                  <div class="text-right">
                    <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection