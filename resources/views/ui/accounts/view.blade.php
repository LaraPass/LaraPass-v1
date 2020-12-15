@extends('ui.layouts.master')

@section('title')
{ {{ $account->title }} } Account Details
@endsection

@section('css')
<script>
    var aid = {{ json_encode($account->id) }};
</script>
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('accounts') }}">ACCOUNTS</a></li>
    <li class="breadcrumb-item active" aria-current="page">{ {{ $account->title }} } Account Details</li>
  </ol>
</nav>
@endsection

@section('nav_accounts')
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
  @include('ui.partials.alerts')
  @include('ui.partials.errors')
  <div class="row">
    <div class="col-xl-8 order-xl-0">
      <div class="card bg-secondary shadow pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">{ {{ $account->title }} }</h3>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Category">{{ $account->category->name }}</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Account information</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-control-label" for="link">URL / Link</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" id="link" name="link" class="form-control form-control-alternative" value="{{ $account->link }}" readonly="">
                    </div>
                    <div class="col-md-1">
                      <a href="{{ $account->link }}" target="_blank" class="btn btn-warning btn-sm" >Open</a>
                    </div>
                    &nbsp;
                    <div class="col-md-1">
                      <button type="button" class="btn btn-default btn-sm" name="btn" id="btn" data-clipboard-target="#link">Copy</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-control-label" for="login_id">Login ID</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" id="login_id" name="login_id" class="form-control form-control-alternative" value="{{ $account->login_id }}" readonly="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-success " name="btn" id="btn" data-clipboard-target="#login_id">Copy</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-control-label" for="login_password">Login Password</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" id="login_password" name="login_password" class="form-control form-control-alternative" value="{{ $account->login_password }}" readonly="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-success " name="btn" id="btn" data-clipboard-target="#login_password">Copy</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-control-label" for="additional_info">Additional Info</label>
                    </div>
                    <div class="col-md-9">
                      <textarea type="text" id="additional_info" name="additional_info" class="form-control form-control-alternative" placeholder="No Addtional Info Available" readonly="">{{ $account->additional_info }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              @if(! $account->folder->isEmpty())
              <div class="col-lg-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-control-label" for="folder">Folder</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" id="folder" name="folder" class="form-control form-control-alternative" value="{{ $account->folder[0]->name }}" readonly="">
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="text-center">
                  <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#edit-account">Edit Account</button>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="text-center">
                  <button type="submit" class="btn btn-danger my-4" data-toggle="modal" data-target="#delete-account">Delete Account</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('ui.accounts.partials.accountNotes')
  </div>
    <!-- Footer -->
  @include('ui.layouts.partials.footer')
<!-- Add New Account Modal -->
@include('ui.accounts.partials.editAccount')
@include('ui.accounts.partials.deleteAccount')
@endsection

@section('js')
<script src="{{ asset('/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script type="text/javascript">
// Clipboard
var clipboard = new ClipboardJS('.btn');

$( document ).ready(function() {
  clipboard.on('success', function(e) {
    $(e.trigger).text("Copied!");
    e.clearSelection();
    setTimeout(function() {
      $(e.trigger).text("Copy");
    }, 2500);
  });

  clipboard.on('error', function(e) {
    $(e.trigger).text("Can't in Safari");
    setTimeout(function() {
      $(e.trigger).text("Copy");
    }, 2500);
  });

});
$(document).ready(function () {
    $('#add').click(function () {
        $('#add').attr('disabled', true);
        $('#create').submit();
        return true;
    });

});
$(document).ready(function(){
    $('.random').click(function(e){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
        url: '/rng',
        type:"POST", 
        data: '', 
        success: function(data){
          document.getElementById("new_login_password").value = data.random;
        }
      });
    });
});
</script>
@endsection