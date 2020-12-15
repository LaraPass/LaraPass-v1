@if (session('Suspended'))
<div class="alert alert-warning" role="alert">
    <strong>!! Account Suspended !!</strong> 
    <br/>Reason: {{ session('Suspended') }}
    <br/>Contact Support for more info.
</div>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@if (session('Banned'))
<div class="alert alert-danger" role="alert">
    <strong>!! Account Banned !!</strong> 
    <br/>Reason: {{ session('Banned') }}
    <br/>Contact Support for more info.
</div>
@endif