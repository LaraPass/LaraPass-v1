@extends('ui.layouts.master')

@section('title')
Backup Manager
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('overview') }}"><i class="fab fa-autoprefixer"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('backups') }}">BACKUP MANAGER</a></li>
  </ol>
</nav>
@endsection

@section('nav_manager')
active
@endsection

@section('css') 
<link href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
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
  <!-- Table -->
  <div class="row">
    <div class="col-md-8">
      @include('ui.partials.alerts')
      @include('ui.partials.errors')
      @if(setting()->get('app_mysql_dump_path') == null)
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
                <h2>Activate Backup Manager</h2>
            </div>
            <form role="form" method="POST" action="{{ route('addPath') }}">
              @csrf
              <div class="text-muted font-italic"><small><b>You need to add your server's <span class="text-success font-weight-700"> mysql_dump_path </span> before we can setup your Backup Manager. Read the docs <a href="https://docs.larapass.net"> here </a> for more details & instructions.</b></small> 
              </div>
              <br/>
              <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-code"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="Add Mysql Dump Path"  name="path" id="path" required="">
                  </div>
              </div>
              <div class="text-center">
                  <button type="submit" class="btn btn-success btn-block my-4">Add Path</button>
              </div>
            </form>
          </div>
        </div>
      @else
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row">
            <div class="col-8">
              <h3 class="mb-0">All Backups</h3>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-success ladda-button" data-style="zoom-in" id="create-new-backup-button" href="{{ url('/admin/manager/backups/create') }}" data-token="{{ csrf_token() }}" ><span class="ladda-label"><i class="fa fa-plus"></i> Create Backup</span></button>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Location</th>
                <th scope="col">Backup Date</th>
                <th scope="col">Filesize</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($backups as $k => $b)
              <tr>
                <td>
                  {{ $k+1 }}
                </td>
                <td>
                  {{ $b['disk'] }}
                </td>
                <td>
                  {{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}
                </td>
                <td>
                  {{ round((int)$b['file_size']/1048576, 2).' MB' }}
                </td>
                <td>
                  @if ($b['download'])
                    <a class="btn btn-xs btn-default" href="{{ url('/admin/manager/backups/download/') }}?disk={{ $b['disk'] }}&path={{ urlencode($b['file_path']) }}&file_name={{ urlencode($b['file_name']) }}"><i class="fa fa-cloud-download"></i> Download</a>
                  @endif
                    <a class="btn btn-xs btn-danger" data-button-type="delete" href="{{ url('admin/manager/backups/delete/'.$b['file_name']) }}?disk={{ $b['disk'] }}"><i class="fa fa-trash-o"></i> Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5">
                  <div class="text-right">
                    <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      @endif
    </div>
  </div>
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) 
  {
    // capture the Create New Backup Button
    $("#create-new-backup-button").click(function(e) 
    {
      e.preventDefault();
      var create_backup_url = $(this).attr('href');
      // create a new instance of ladda for the specified button
      var l = Ladda.create(document.querySelector('#create-new-backup-button'));

      // Start Loading
      l.start();

      // Display a progress bar for 10% of the button width
      l.setProgress(0.3);

      setTimeout(function(){ l.setProgress(0.6); }, 2000);

      // Do the backup through ajax
      $.ajax({
        url: create_backup_url,
        type: 'GET',
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(result) 
        {
          l.setProgress(0.9);
          // Show an alert with the result
          if(result.indexOf('failed') >= 0) 
          {
            new PNotify({
              title: "Unknown error",
              text: "Your backup may NOT have been created. Please check log files for details.",
              type: "warning",
            });
          }
          else
          {
            new PNotify({
              title: "Backup completed",
              text: "Reloading the page in 3 seconds.",
              type: "success"
            });
          }

          // Stop Loading
          l.setProgress(1);
          l.stop();

          // Refresh the page to show the new file
          setTimeout(function(){ location.reload(); }, 3000);
        },
        error: function(result) 
        {
          l.setProgress(0.9);

          // Show an alter with the result
          new PNotify ({
            title: "Backup error",
            text: "The backup file could NOT be created.",
            type: "warning",
          });

          // Stop Loading
          l.stop();
        }
      });
    });
  });

</script>
@endsection