@extends('ui.layouts.master')

@section('title')
Secured Accounts in {{ $folder->name }}
@endsection

@section('css')
<style>
.vl {
  border-left: 2px solid;
}
</style>
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('accounts') }}">ACCOUNTS</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ strtoupper($folder->name) }} FOLDER</li>
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
      @include('ui.accounts.partials.cards')
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  @include('ui.partials.alerts')
  @include('ui.partials.errors')
  <div class="row mt-4">
  	<div class="col-md-3">
      <a class="btn btn-icon btn-3 btn-secondary btn-block" href="{{ route('accounts') }}">
        <span class="btn-inner--icon"><i class="fa fa-hand-o-left"></i></span>
        <span class="btn-inner--text">Back to Accounts</span>
      </a>
  		<button class="btn btn-icon btn-3 btn-success btn-block" type="button" data-toggle="modal" data-target="#add-folder-account">
  			  <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
  		    <span class="btn-inner--text">Add New Account</span>
  		</button>
  		<hr>
  		<h5 class="heading-small text-muted mb-4">Current Folder</h5>
  		<div style="padding-bottom: 3px;">
  		    <button type="button" class="btn btn-default btn-block" data-toggle="tooltip" data-placement="left" title="Open Folder">
  		    <span><i class="fa fa-{{ $folder->icon }}"></i>&nbsp;&nbsp;&nbsp;{{ $folder->name }}</span>
  		    <span class="badge badge-white">{{ $folder->accounts()->count() }}</span>
          @if($folder->password)
          <span class="pull-right"><i class="fas fa-lock"></i></span>
          @else
          <span class="pull-right"><i class="fa fa-unlock"></i></span>
          @endif
  		    </button>
          @if($folder->password)
          <button class="btn btn-icon btn-3 btn-warning btn-block" type="button" data-toggle="modal" data-target="#remove-password">
              <span class="btn-inner--icon"><i class="fa fa-unlock"></i></span>
              <span class="btn-inner--text">Remove Password</span>
          </button>
          @endif
  		</div>   
      <hr>
      <h5 class="heading-small text-muted mb-4">Actions</h5>
      <div class="col-md-12">
        <div class="row mt-1">
          <button class="btn btn-icon btn-block btn-3 btn-danger" type="button" data-toggle="modal" data-target="#delete-folder">
            <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
            <span class="btn-inner--text">Delete this Folder</span>
          </button>
        </div>
  	  </div>
    </div>
    <div class="col-md-9">
    	<div class="row">
    		@foreach($accounts as $account)
        	<div class="col-md-6" style="margin-bottom: 25px">
          		<div class="card-dec">
			  		<div class="card bg-secondary border-primary shadow pull-up"> 
					    <div class="card-body">
					      <h3>{{ $account->title }}
					      	<small class="text-muted">
                    ( {{ $account->category->name }} )
                </small>
                <span class="pull-right">
                  @if(! ($account->folder->isEmpty()))
                  <span data-toggle="modal" data-target="#folder_view{{ $account->id }}">
                    <button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="{{ $account->folder[0]->name }}"><i class="ni ni-folder-17"></i></button>
                  </span>
                  @else
                  <span data-toggle="modal" data-target="#add_folder{{ $account->id }}">
                    <button class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Add to a Folder"><i class="ni ni-folder-17"></i></button>
                  </span>
                  @endif
                </span>
               </h3>
					    </div>
			    		<div class="card-footer">
                <div class="row justify-content-md-center">
					       <button class="btn btn-primary" data-toggle="modal" data-target="#modal-view{{$account->id}}" >Quick View</button>
                  <form role="form" method="POST" action="{{ route('viewAccount') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $account->id }}">
  					        <button type="submit" class="btn btn-warning pull-right" >Account Details</button>
                  </form>
                </div>
					    </div>
			  		</div>
			  	</div>
		  	</div>
		  	@endforeach
		 </div>
    </div>
    <!-- Footer -->
  @include('ui.layouts.partials.footer')
<!-- Quick View Modal -->
@foreach($accounts as $account)
  @include('ui.accounts.partials.viewAccount')
    @include('ui.accounts.partials.accountFolder')
@endforeach
@include('ui.accounts.partials.removePassword')
@include('ui.accounts.partials.deleteFolder')
@include('ui.accounts.partials.addFolderAccount')
@endsection

@section('js')
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