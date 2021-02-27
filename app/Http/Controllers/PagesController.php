<?php

namespace App\Http\Controllers;

use App\Page;
use Redirect;

class PagesController extends Controller
{
    /*
     * Display Privacy Policy Page
     */
    public function privacy()
    {
        if (\Setting::get('app_privacy') == 'default') {
            return view('pages.privacy');
        } else {
            return Redirect::to(\Setting::get('app_privacy'));
        }
    }

    /*
     * Display Terms of Service Page
     */
    public function terms()
    {
        if (\Setting::get('app_terms') == 'default') {
            return view('pages.terms');
        } else {
            return Redirect::to(\Setting::get('app_terms'));
        }
    }
}
