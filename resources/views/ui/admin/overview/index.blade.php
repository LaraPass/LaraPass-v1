@extends('ui.layouts.master')

@section('title')
Admin Overview
@endsection

@section('css')
<!-- Page plugins -->
<link rel="stylesheet" href="{{ asset('ui/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('ui/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('ui/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<style type="text/css">
  .dataTables_wrapper{font-size:.875rem}table.dataTable{margin-bottom:1.25rem!important;border-bottom:1px solid #e9ecef}table.dataTable tbody>tr.selected{background-color:#5e72e4}.dataTables_info,.dataTables_length,.dt-buttons{padding-left:1.5rem}.dataTables_length .form-control{margin:0 .375rem}.dataTables_filter{display:inline-block;float:right;padding-right:1.5rem}.dataTables_paginate{padding-right:1.5rem}
</style>
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('overview') }}"><i class="fab fa-autoprefixer"></i> ADMIN OVERVIEW</a></li>
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
      @include('ui.admin.overview.partials.cards')
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <!-- Table -->
  <div class="row">
    <div class="col">
      @include('ui.partials.alerts')
      @include('ui.partials.errors')
      <div class="col-xl-6 order-xl-1">
        @include('ui.admin.overview.partials.announcement')
        <br/>
      </div>
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row">
            <div class="col-8">
              <h2>All Users</h2>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#add-user">Add User</button>
            </div>
          </div>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
              <tr>
                <th scope="col">User ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">2-Step</th>
                <th scope="col">Status</th>
                <th scope="col">Email Verified At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($siteUsers as $siteUser)
              <tr>
                <td>
                  {{ $siteUser->id }}
                </td>
                <td>
                  {{ $siteUser->username }}
                </td>
                <td>
                    {{ $siteUser->email }}
                </td>
                <td>
                  @if($siteUser->two_step)
                  <span class="badge badge-dot mr-4">
                    <i class="bg-success"></i> Enabled
                  </span>
                  @else
                  <span class="badge badge-dot mr-4">
                    <i class="bg-danger"></i> Disabled
                  </span>
                  @endif
                </td>
                <td>
                  @if($siteUser->status=='Active')
                  <span class="badge badge-dot mr-4">
                    <i class="bg-success"></i> {{ $siteUser->status }}
                  </span>
                  @else
                  <span class="badge badge-dot mr-4">
                    <i class="bg-danger"></i> {{ $siteUser->status }}
                  </span>
                  @endif
                </td>
                <td>
                  {{ $siteUser->email_verified_at }}
                </td>
                <td >
                  <a href="{{ url('/admin/user/'.$siteUser->id) }}" class="btn btn-sm btn-default ">View Details</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @include('ui.admin.overview.partials.addUser')
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
  $("#password").keyup(function(){
      check_pass();
  });
});

function check_pass()
{
  var val=document.getElementById("password").value;
  var no=0;
  if(val!="")
  {
    // If the password length is less than or equal to 6
    if(val.length<=6)no=1;

    // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
    if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

    // If the password length is greater than 6 and contain alphabet,number,special character respectively
    if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

    // If the password length is greater than 6 and must contain alphabets,numbers and special characters
    if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

    // If the password length is greater than 15 and must contain alphabets,numbers and special characters
    if(val.length>15 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=5;

    if(no==1)
    {
     document.getElementById("pass_type").innerHTML="Very Weak [think of a better password]";
    }

    if(no==2)
    {
     document.getElementById("pass_type").innerHTML="Weak [still need a better password]";
    }

    if(no==3)
    {
     document.getElementById("pass_type").innerHTML="Good [Its ok, but you can do better]";
    }

    if(no==4)
    {
     document.getElementById("pass_type").innerHTML="Strong ";
    }

    if(no==4)
    {
     document.getElementById("pass_type").innerHTML="Very Strong ";
    }
  }

  else
  {
    document.getElementById("pass_type").innerHTML="";
  }
}
</script>
<script src="{{ asset('ui/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('ui//vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('ui//vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('ui//vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('ui//vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('ui//vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('ui//vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('ui//vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script type="text/javascript">
  var DatatableBasic=function()
  {
    var e=$("#datatable-basic");
    e.length&&e.on("init.dt",function()
      {
        $("div.dataTables_length select").removeClass("custom-select custom-select-sm")
      }).DataTable({
        keys:!0,
        select:{style:"multi"},
        language:{paginate:{previous:"<i class='fas fa-angle-left'>",next:"<i class='fas fa-angle-right'>"}}})
    }(),DatatableButtons=function()
    {
      var e,a=$("#datatable-buttons");
      a.length&&(e={lengthChange:!1,dom:"Bfrtip",buttons:["copy","print"],
        language:{paginate:{previous:"<i class='fas fa-angle-left'>",next:"<i class='fas fa-angle-right'>"}}},
        a.on("init.dt",function(){$(".dt-buttons .btn").removeClass("btn-secondary").addClass("btn-sm btn-default")}).DataTable(e))}()
</script>
@endsection