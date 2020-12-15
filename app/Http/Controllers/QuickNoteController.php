<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\QuickNote;
use Illuminate\Http\Request;

class QuickNoteController extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth','verified','2fa']);
    }

    /*
     * Returning Collection of Quick Notes
     */
     public function index()
     {
        $notes = QuickNote::where('user_id',Auth::user()->id)->get();
        return view('ui.notes.index')->with(compact('notes'));
     } 

     /*
      * Storing a newly created Quick Note in database.
      */
     public function store(Request $request)
     {
        $this->validate($request, [
            'content' => 'required|min:3',
        ]);

        $note = QuickNote::create([
            'user_id' => Auth::user()->id,
            'content' => request('content'),
        ]);

        if (request()->expectsJson()) {
            return $note;
        }

        return back();
     }

     /*
      * Deleting a Quick Note
      */
     public function destroy(QuickNote $note)
    {
        if($note->user->id == Auth::user()->id) {

            $this->authorize('update',$note);
            $note->delete();

        } else {

            return redirect('/login');

        }     
    }
}
