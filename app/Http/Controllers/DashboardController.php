<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\QuickNote;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     *
     */
    public function __construct()
	{
		$this->middleware(['auth','verified','2fa']);
	}

	public function index()
	{
		$notes = QuickNote::oldest()->where('user_id','=',Auth::user()->id)->get();
		return view('ui.dashboard.index')->with(compact('notes'));
	}
}
