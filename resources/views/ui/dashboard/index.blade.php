@extends('ui.layouts.master')

@section('title')
Dashboard
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>  </ol>
</nav>
@endsection

@section('nav_dashboard')
active
@endsection

@section('content')
  <!-- Header container -->
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      @include('ui.dashboard.partials.cards')
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
    @include('ui.partials.alerts')
    @include('ui.partials.errors')
  <div class="row mt-5">
    @include('ui.dashboard.partials.announcements')
    @include('ui.dashboard.partials.quickNotes')
    @include('ui.dashboard.partials.sideCards')
  </div>
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection
@section('js')
<script src="{{ asset('/js/app.js') }}"></script>
<script type="text/javascript">
    function startTime() {
        var today=new Date(),
        curr_hour=today.getHours(),
        curr_min=today.getMinutes(),
        curr_sec=today.getSeconds();
        curr_hour=checkTime(curr_hour);
        curr_min=checkTime(curr_min);
        curr_sec=checkTime(curr_sec);
        document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;
    }
    function checkTime(i) {
        if (i<10) {
            i="0" + i;
        }
        return i;
    }
    setInterval(startTime, 500);
</script>
@endsection