<div class="modal fade" id="make-admin" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-info">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification">Promote User to Admin Status</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h2 class="heading mt-4">Make {{ $user->username }} an Admin?</h2>
                    <p>Once promoted, {{ $user->username }} will have access to all Admin Settings available. Be sure to only promote trust worthy users.</p>
                </div>
            </div>
            <div class="modal-footer">
            	<form role="form" method="POST" action="{{ route('promoteToAdmin', $user) }}">
            		@csrf
                	<button type="submit" class="btn btn-white">Promote</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>