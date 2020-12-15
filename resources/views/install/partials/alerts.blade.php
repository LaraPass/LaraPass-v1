@if($errors->any())
  @foreach ($errors->all() as $error)
  	<div class="notification is-danger"><strong>Oh snap!</strong> {{ $error }}</div>
  @endforeach
@endif