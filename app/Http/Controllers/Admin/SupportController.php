<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SupportEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     *
     */
    public function __construct()
	{
		$this->middleware(['auth','verified','2fa']);
	}

	/* Display the changelog page is the admin has set it as visible */
	public function changelog()
	{
		if(setting()->get('app_changelog'))
			return view('ui.support.changelog');
		else
			return back()->withErrors('Page Not Available');
	}

	/* Display the Contact Support Page */
	public function contact()
	{
		return view('ui.support.contact');
	}

	/* Send the support email to admins */
	public function sendEmail(Request $request)
	{
		$this->validate($request, [
			'support_type' => 'required',
			'support_subject' => 'required',
			'support_message' => 'required',
		]);

		$mail_to = \Setting::get('app_email');
		Mail::to($mail_to)->send(new SupportEmail($request));
		return redirect('dashboard')->with('success', 'Email Sent Successfully');
	}
}
