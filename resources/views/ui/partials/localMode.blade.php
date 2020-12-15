@if(setting()->get('app_env')=='local')
<div class="alert alert-danger" role="alert">
  <span class="alert-inner--icon"><i class="fas fa-close"></i></span>
  <span class="alert-inner--text"><strong>Warning</strong> Application running in Local (Dev) Mode. Switch to Production Mode for Live websites.</span>
</div>
@endif