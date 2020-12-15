<div class="modal fade" id="folder_view{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-primary">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-notification"><i class="fa fa-{{ $account->folder[0]->icon }}"></i>&nbsp;&nbsp;&nbsp;{{ $account->folder[0]->name }} Folder</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-folder-17 ni-3x"></i>
                    <h1 class="text-white mt-4">{{ $account->title }}</h1>
                    <p>If you want to move this account to another folder, remove it from this folder and add it onto another.</p>
                </div>
            </div>
            <div class="modal-footer">
            	<form role="form" method="POST" action="{{ url('/accounts/'.$account->id.'/folder/'.$account->folder[0]->id) }}">
            		@csrf
            		<input type="hidden" name="_method" value="DELETE">
            		<input type="hidden" name="id" value="{{ $account->id }}">
                	<button type="submit" class="btn btn-white">Remove from {{ $account->folder[0]->name }} folder</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>