<div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification">Warning! Attempting to Delete User Account </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h2 class="heading mt-4">Permanantly delete {{ $user->username }} ?</h2>
                    <p>This action cannot be reversed. All details and vault items associated with { {{ $user->username }} } will be removed from the database permanantly.</p>
                </div>
            </div>
            <div class="modal-footer">
            	<form role="form" method="POST" action="{{ url('/admin/user/'.$user->id.'/delete') }}">
            		@csrf
                	<button type="submit" class="btn btn-white">Ok, Delete it</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>