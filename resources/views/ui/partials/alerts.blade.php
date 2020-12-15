@if (session('success'))
<div class="alert alert-success" role="alert">
    <strong>Yay!</strong> {{ session('success') }}
</div>
@endif
@if (session('updated'))
<div class="alert alert-warning" role="alert">
    <strong>Yay!</strong> {{ session('updated') }}
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger" role="alert">
    <strong>Sorry!</strong> {{ session('danger') }}
</div>
@endif
@if (session('info'))
<div class="alert alert-info" role="alert">
    <strong>Sorry!</strong> {{ session('info') }}
</div>
@endif