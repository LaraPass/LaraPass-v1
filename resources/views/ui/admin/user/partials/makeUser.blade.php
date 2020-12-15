<div class="modal fade" id="make-user" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-info">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification">Demote Admin to User Status</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h2 class="heading mt-4">Make {{ $user->username }} a User?</h2>
                    <p>Once demoted, {{ $user->username }} will no longer have access to any Admin Settings.</p>
                </div>
            </div>
            <div class="modal-footer">
            	<form role="form" method="POST" action="{{ route('demoteToUser', $user) }}">
            		@csrf
                	<button type="submit" class="btn btn-white">Demote</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>