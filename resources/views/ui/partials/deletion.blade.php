<div class="alert alert-danger" role="alert">
  <span class="alert-inner--icon"><i class="fas fa-close"></i></span>
  <span class="alert-inner--text"><strong>Alert!</strong> This account is marked for deletion & will be deleted on {{ \Carbon\Carbon::parse(Auth::user()->delete_on)->format('Y-m-d') }} (i.e., {{ \Carbon\Carbon::parse(Auth::user()->delete_on)->diffForHumans() }}) - Go to Profile settings to cancel deletion.</span>
</div>