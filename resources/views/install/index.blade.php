@extends('install.layouts.master')

@section('title')
Checking Requirements 
@endsection

@section('content')
<div class="tabs is-fullwidth">
    <ul>
      	<li class="is-active">
        	<a>
          		<span><b>Requirements</b></span>
        	</a>
      	</li>
      	<li>
        	<a>
          		<span>License</span>
        	</a>
      	</li>
      	<li>
        	<a>
          		<span>Environment</span>
        	</a>
      	</li>
      	<li>
        	<a>
         		<span>Database</span>
        	</a>
      	</li>
      	<li>
        	<a>
          		<span>Finish</span>
        	</a>
      	</li>
    </ul>
</div>
<?php  /*Add or remove your script's requirements below*/
	$errors=FALSE;
	if(version_compare(PHP_VERSION, '7.1.0') < 0)
	{	$errors = TRUE;
		echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Current PHP version is ".phpversion()."! minimum PHP 7.1 or higher required.</div>";
	}
	else
		echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> You are running PHP version ".phpversion()."</div>";
 	if(!extension_loaded('pdo'))
	{	$errors = TRUE; 
		echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> PDO PHP extension missing!</div>";
	}
	else
		echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> PDO PHP extension available</div>";
 	if(!extension_loaded('curl'))
	{	$errors = TRUE; 
		echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Curl PHP extension missing!</div>";
	}
	else
		echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Curl PHP extension available</div>";
	if(!extension_loaded('zip'))
	{	$errors = TRUE; 
		echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Zip PHP extension missing!</div>";
	}
	else
		echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Zip PHP extension available</div>";
	if(!extension_loaded('openssl'))
	{	$errors = TRUE; 
		echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Openssl PHP extension missing!</div>";
	}
	else
		echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Openssl PHP extension available</div>";
?>
<div style='text-align: right;'>
	@if($errors)
		<a href="#" class="button is-link" disabled>Next</a>
	@else
		<form method="GET" action="{{ url('/admin/install/step1') }}">
			@csrf
			<button type="submit" class="button is-link">Next</button>
		</form>
	@endif
</div>
@endsection