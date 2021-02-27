<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSettingsUpdateForm;
use App\Http\Requests\DatabaseSettingsUpdateForm;
use App\Http\Requests\MailerSettingsUpdateForm;
use App\Mail\DemotedToUserStatus;
use App\Mail\PromotedToAdminStatus;
use App\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use TechTailor\RPG\Facade\RPG;

class AdminController extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', '2fa', 'is_admin']);
    }

    /*
     * Display the Overview Page to the Admin
     */
    public function index()
    {
        $siteUsers = User::all();

        return view('ui.admin.overview.index')->with(compact('siteUsers'));
    }

    /*
     * Display the User Profile Page to the Admin
     */
    public function user(User $user)
    {
        return view('ui.admin.user.index')->with(compact('user'));
    }

    /*
     * Change a User's Email Address After Validating Support PIN
     */
    public function changeEmail(Request $request, User $user)
    {
        $messages = [
            'change.required' => 'Please select YES to change Email Address.',
            'change.numeric'  => 'Selection Invalid.',
            'pin.required'    => 'Support PIN is required.',
            'pin.numeric'     => 'Support PIN must be a number.',
            'email.required'  => 'New Email Address is required.',
        ];

        $this->validate($request, [
            'change' => 'required|numeric',
            'pin'    => 'required|numeric',
            'email'  => 'required|unique:users',
        ], $messages);

        if (!$request->change) {
            return back()->withErrors('Invalid Option Selected');
        }

        $upin = $user->support_pin;

        if ($upin == $request->pin) {
            $user->email = $request->email;
            $user->email_verified_at = null;
            $user->save();
            $request->user()->sendEmailVerificationNotification();

            return back()->with('success', 'User Email Updated Successfully. Verification Email Sent to User.');
        } else {
            return back()->withErrors('Invalid Support PIN');
        }
    }

    /*
     * Verify a User's Support PIN
     */
    public function verifyPIN(Request $request, User $user)
    {
        $messages = [
            'pin.required' => 'Support PIN is required.',
            'pin.numeric'  => 'Support PIN must be a number.',
        ];

        $this->validate($request, [
            'pin' => 'required|numeric',
        ], $messages);

        $upin = $user->support_pin;

        if ($upin == $request->pin) {
            return back()->with('success', 'Support PIN Verified Successfully');
        } else {
            return back()->withErrors('Invalid Support PIN');
        }
    }

    /*
     * Take action against a User - Ban/Suspend (Manual)
     */
    public function takeAction(Request $request, User $user)
    {
        $messages = [
            'take.required'   => 'Please select YES to Take Action..',
            'take.numeric'    => 'Selection Invalid.',
            'action.required' => 'Action is required.',
            'remark.required' => 'Remark is required.',
        ];

        $this->validate($request, [
            'take'   => 'required|numeric',
            'action' => 'required',
            'remark' => 'required',
        ], $messages);

        if (!$request->take) {
            return back()->withErrors('Invalid Option Selected');
        }

        $user->status = $request->action;
        $user->remark = $request->remark;
        $user->save();

        return back()->with('success', 'Action Taken Successfully');
    }

    /*
     * Remove a BAN from a User Account (Manual)
     */
    public function removeBan(Request $request, User $user)
    {
        $messages = [
            'remove.required' => 'Please select YES to Take Action..',
            'remove.numeric'  => 'Selection Invalid.',
            'remark.required' => 'Remark is required.',
        ];

        $this->validate($request, [
            'remove' => 'required|numeric',
            'remark' => 'required',
        ], $messages);

        if (!$request->remove) {
            return back()->withErrors('Invalid Option Selected');
        }

        $user->status = 'Active';
        $user->remark = $request->remark;
        $user->save();

        return back()->with('success', 'BAN Removed from User Account Successfully');
    }

    /*
     * Delete a User Account Permanantly. The account has to be banned first.
     */
    public function deleteUser(User $user)
    {
        if ($user->status != 'Banned') {
            return back()->with('danger', 'Sorry, Account Cannot be Deleted. You need to ban this user first.');
        } elseif ($user->status == 'Banned') {
            $user->delete();

            return redirect('admin/overview')->with('success', 'Account Deleted Successfully');
        }
    }

    /*
     * Register a New User (intended for PRIVATE MODE Applications)
     */
    public function registerUser(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string|max:255',
            'username' => 'required|min:6|max:15|unique:users',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $pin = RPG::Generate('d', 4, 0);

        $user = User::create([
            'name'        => $request['name'],
            'username'    => $request['username'],
            'email'       => $request['email'],
            'password'    => Hash::make($request['password']),
            'rng_level'   => 2,
            'support_pin' => $pin,
            'type'        => User::DEFAULT_TYPE,
        ]);

        event(new Registered($user));

        return redirect('/admin/overview')->with('success', 'User Account Registered Successfully');
    }

    /*
     * Display the User's Login IP Logs to the Admin
     */
    public function userLogs(User $user)
    {
        $iplogs = $user->authentications;
        $deletionLogs = $user->mark_for_deletion_logs;

        return view('ui.admin.user.logs')->with(compact('iplogs', 'user', 'deletionLogs'));
    }

    /*
     * Promote a User to Admin Status
     */
    public function promoteToAdmin(User $user)
    {
        if (Auth::user()->type === 'admin') {
            $user->type = User::ADMIN_TYPE;
            $user->save();

            Mail::to($user->email)->send(new PromotedToAdminStatus($user));

            return back()->with('success', 'User successfully promoted to Admin Status');
        } else {
            return redirect('dashboard')->with('danger', 'Invalid');
        }
    }

    /*
     * Promote a User to Admin Status
     */
    public function demoteToUser(User $user)
    {
        if (Auth::user()->type === 'admin') {
            $user->type = User::DEFAULT_TYPE;
            $user->save();

            Mail::to($user->email)->send(new DemotedToUserStatus($user));

            return back()->with('success', 'User successfully demoted to User Status');
        } else {
            return redirect('dashboard')->with('danger', 'Invalid');
        }
    }

    /*
     * Display the App Settings Page to the Admin
     */
    public function settings()
    {
        $categories = Category::all();

        return view('ui.admin.settings.index')->with(compact('categories'));
    }

    /*
     * Updating any changes to the App Settings made by the Admin
     */
    public function updateSettings(AdminSettingsUpdateForm $request)
    {
        setting()->set('app_name', $request->app_name);
        setting()->set('app_url', $request->app_url);
        setting()->set('app_description', $request->app_description);
        setting()->set('app_email', $request->app_email);
        setting()->set('app_mail_sender', $request->app_mail_sender);
        setting()->set('app_default_membership', $request->app_default_membership);
        setting()->set('recaptcha_site_key', $request->recaptcha_site_key);
        setting()->set('recaptcha_secret_key', $request->recaptcha_secret_key);
        setting()->set('app_mail_sender_name', $request->app_mail_sender_name);
        setting()->set('app_about', $request->app_about);
        setting()->set('app_privacy', $request->app_privacy);
        setting()->set('app_terms', $request->app_terms);

        if ($request->recaptcha_site_key && $request->recaptcha_secret_key) {
            setting()->set('recaptcha_active', 'true');
        } else {
            setting()->set('recaptcha_active', 'false');
        }

        if ($request->hasFile('app_logo')) {
            $app_logo = $request->file('app_logo');
            $name = 'logo_main.'.$app_logo->getClientOriginalExtension();
            $destinationPath = public_path('ui/img/brand/');
            $app_logo->move($destinationPath, $name);
            setting()->set('app_logo', $name);
        }

        if ($request->hasFile('app_logo_white')) {
            $app_logo_white = $request->file('app_logo_white');
            $name = 'logo_white.'.$app_logo_white->getClientOriginalExtension();
            $destinationPath = public_path('ui/img/brand/');
            $app_logo_white->move($destinationPath, $name);
            setting()->set('app_logo_white', $name);
        }

        if ($request->hasFile('app_favicon')) {
            $app_favicon = $request->file('app_favicon');
            $name = 'favicon.'.$app_favicon->getClientOriginalExtension();
            $destinationPath = public_path('ui/img/brand/');
            $app_favicon->move($destinationPath, $name);
            setting()->set('app_favicon', $name);
        }

        setting()->save();

        Artisan::call('config:clear');

        return back()->with('success', 'Setting Updated Successfully');
    }

    /*
     * Updating Mailer Settings
     */
    public function updateMailer(MailerSettingsUpdateForm $request)
    {
        setting()->set('app_mail_driver', $request->app_mail_driver);
        setting()->set('app_mail_host', $request->app_mail_host);
        setting()->set('app_mail_port', $request->app_mail_port);
        setting()->set('app_mail_encryption', $request->app_mail_encryption);
        setting()->set('app_mail_username', $request->app_mail_username);
        setting()->set('app_mail_password', $request->app_mail_password);
        setting()->set('app_mail_sender', $request->app_mail_sender);
        setting()->set('app_mail_sender_name', $request->app_mail_sender_name);
        setting()->set('mailgun_domain', $request->mailgun_domain);
        setting()->set('mailgun_secret', $request->mailgun_secret);
        setting()->save();

        Artisan::call('config:clear');

        return back()->with('success', 'Mailer Settings Updated Successfully');
    }

    /*
     * Updating Database Settings
     */
    public function updateDatabase(DatabaseSettingsUpdateForm $request)
    {
        setting()->set('db_mysql_host', $request->db_mysql_host);
        setting()->set('db_mysql_port', $request->db_mysql_port);
        setting()->set('db_mysql_database', $request->db_mysql_database);
        setting()->set('db_mysql_username', $request->db_mysql_username);
        setting()->set('db_mysql_password', $request->db_mysql_password);
        setting()->save();

        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('clear-compiled');

        return back()->with('success', 'Database Settings Updated Successfully');
    }

    /*
     * Change Access Mode (PUBLIC/PRIVATE)
     */
    public function accessMode(Request $request)
    {
        $this->validate($request, [
            'mode' => 'required',
        ]);

        setting()->set('app_mode', $request->mode);
        setting()->save();

        return back()->with('success', 'Application Access Mode Updated Successfully');
    }

    /*
     * Make an announcement for the site users (displayed on the user dahsboard)
     */
    public function makeAnnouncement(Request $request)
    {
        $this->validate($request, [
            'app_announcement' => 'required',
        ]);

        setting()->set('app_announcement', $request->app_announcement);
        setting()->set('app_announcement_at', Now()->toDateString());
        setting()->save();

        return redirect('/admin/overview')->with('success', 'Annoucement Made Successfully');
    }

    /*
     * Take the Application out of Maintenance Mode and Go LIVE
     */
    public function goLive(Request $request)
    {
        if ($request->status) {
            Artisan::call('up');

            return back()->with('success', 'Your Application is Now Live');
        } else {
            return back()->with('danger', 'Error');
        }
    }

    /*
     * Put the Application in Maintenance Mode (app will be inaccessible for any other user except the Admin)
     */
    public function goDown(Request $request)
    {
        $ip = \Request::ip();
        $message = $request->message;

        Artisan::call('down', ['--allow' => $ip, '--message' => $message]);

        return back()->with('success', 'Maintenance Mode is Now Active');
    }

    /*
     * Change the Background Color Scheme of Login & Inner Pages.
     */
    public function changeScheme(Request $request)
    {
        if (setting()->get('app_version') == '1.4.1') {
            setting()->set('app_version', '1.4.2');
        }

        setting()->set('page_background_login', $request->page_background_login);
        setting()->set('page_background_inner', $request->page_background_inner);

        Artisan::call('view:clear');

        return back()->with('success', 'Background Scheme Changed Successfully');
    }

    /*
     * Set application environement to local development mode. Enables debugging.
     */
    public function goLocal()
    {
        setting()->set('app_env', 'local');
        setting()->set('app_debug', true);
        setting()->save();

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return back()->with('success', 'Application Environment is now set to Local Development Mode');
    }

    /*
     * Set application environement to local development mode. Enables debugging.
     */
    public function goProduction()
    {
        setting()->set('app_env', 'production');
        setting()->set('app_debug', false);
        setting()->save();

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return back()->with('success', 'Application Environment is now set to Production Mode');
    }
}
