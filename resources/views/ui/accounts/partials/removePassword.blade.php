<div class="modal fade" id="remove-password" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification">Warning! Remove Password Protection</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h2 class="heading mt-4">Are your sure you want remove password protection from this folder ?</h2>
                </div>
            </div>
            <div class="modal-footer">
            	<form role="form" method="POST" action="{{ url('/accounts/folder/'.$folder->id.'/password') }}">
            		@csrf
            		<input type="hidden" name="_method" value="DELETE">
            		<input type="hidden" name="id" value="{{ $folder->id }}">
                	<button type="submit" class="btn btn-white">Ok, Remove it</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>