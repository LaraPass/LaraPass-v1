@if($errors->any())
  @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
          <strong>Oh snap!</strong> {{ $error }}
      </div>
  @endforeach
@endif