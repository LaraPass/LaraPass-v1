<div class="modal fade" id="cancel-deletion" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-primary">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification">Cancel Deleteion of My {{ setting()->get('app_name') }} Account?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h2 class="heading mt-4">Are you sure you want to do this ?</h2>
                    <p>If you have accidentally marked your {{ setting()->get('app_name') }} account for deletion, you can cancel it here. No associated accounts will be effected.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form role="form" method="POST" action="{{ route('cancelDeletion') }}">
                    @csrf
                    <button type="submit" class="btn btn-white">Ok, Cancel Deletion</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>