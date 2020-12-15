@extends('ui.layouts.master')

@section('title')
Accounts in Vault
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
    		<button class="btn btn-icon btn-3 btn-success btn-block" type="button" data-toggle="modal" data-target="#add-account">
  			  <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
  		    <span class="btn-inner--text">Add New Account</span>
  		  </button>
        <button class="btn btn-icon btn-3 btn-info btn-block" type="button" data-toggle="modal" data-target="#create-folder">
          <span class="btn-inner--icon"><i class="ni ni-folder-17"></i></span>
          <span class="btn-inner--text">Create New Folder</span>
        </button>
      @include('ui.accounts.partials.folders')
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
  @include('ui.accounts.partials.addFolder')
  @if(! ($account->folder->isEmpty()))
    @include('ui.accounts.partials.accountFolder')
  @endif
@endforeach
@include('ui.accounts.partials.addAccount')
@include('ui.accounts.partials.createFolder')
@include('ui.accounts.partials.exportAccounts')
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
  $('.selectpicker').selectpicker();
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