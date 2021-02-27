<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', '2fa']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/dashboard');
    }

    /*
     * Logging current user out and flushing all sessions
     */
    public function logout()
    {
        Auth::logout();
        session()->invalidate();

        return $this->loggedOut() ?: redirect('/');
    }
}
