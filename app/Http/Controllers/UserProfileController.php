<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePasswordForm;
use App\Http\Requests\ProfileUpdateForm;
use App\Mail\CancelledDeletionEmail;
use App\Mail\MarkedForDeletionEmail;
use App\MarkForDeletionLog;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', '2fa']);
    }

    /*
     * Function to display users their profile page.
     *
     */
    public function index()
    {
        return view('ui.profile.index');
    }

    /**
     * Function to update user profile.
     */
    public function update(ProfileUpdateForm $request)
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        $dob = \Carbon\Carbon::parse($request->dob);

        // Checking if a future date is set for Date of Birth
        if ($dob->greaterThanOrEqualTo($now)) {
            return back()->with('danger', 'Cannot select a future date');
        }

        Auth::user()->name = $request->name;
        Auth::user()->support_pin = $request->support_pin;
        Auth::user()->rng_level = $request->rng_level;
        Auth::user()->mobile = $request->mobile;

        Auth::user()->dob = $request->dob;
        Auth::user()->country = $request->country;
        Auth::user()->save();

        return redirect('profile')->with('success', 'Profile Updated Successfully');
    }

    /**
     * Function to verify the current password and encrypt and update the new password.
     */
    public function updatePassword(ProfilePasswordForm $request)
    {
        $oldpass = Auth::user()->password;
        $passwords = $request->all();
        $current_password = $passwords['current_password'];
        $newpass = $passwords['password'];
        if (Hash::check($current_password, $oldpass)) {
            Auth::user()->forceFill([
                'password'       => Hash::make($newpass),
                'remember_token' => Str::random(60),
            ])->save();

            return redirect('profile')->with('success', 'Password Changed Successfully');
        } else {
            return redirect('profile')->with('danger', 'Current Password does not match our records.');
        }
    }

    /**
     * Function to display the avatar portfolio.
     */
    public function avatar()
    {
        return view('profile.avatar');
    }

    /**
     * Function to update the user avatar.
     */
    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('ui/img/profile/');
            $image->move($destinationPath, $name);
            Auth::user()->avatar = $name;
            Auth::user()->save();

            return redirect('profile')->with('success', 'Avatar Updated successfully');
        }
    }

    /*
     * Display all login ip logs to user
     */
    public function ipLogs()
    {
        $iplogs = auth()->user()->authentications;

        return view('ui.profile.logs')->with(compact('iplogs'));
    }

    /*
     * Mark user profile for deletion.
     */
    public function delete()
    {
        $delete_on = \Carbon\Carbon::Now()->addDays(7);

        $user = Auth::user();

        $mark = new MarkForDeletionLog();
        $mark->user_id = $user->id;
        $mark->username = $user->username;
        $mark->action = 'Marked for Deletion';
        $mark->ip_address = \Request::ip();
        $mark->user_agent = \Request::header('User-Agent');
        $mark->save();

        $user->delete_on = $delete_on;
        $user->save();

        Mail::to($user->email)->send(new MarkedForDeletionEmail());

        return back()->with('success', 'You profile is now marked for deletion and will be deleted permanantly on '.$delete_on->format('Y-m-d H:i'));
    }

    /*
     * Cancel deletion of User Profile
     */
    public function cancelDeletion()
    {
        $user = Auth::user();

        $mark = new MarkForDeletionLog();
        $mark->user_id = $user->id;
        $mark->username = $user->username;
        $mark->action = 'Cancelled Deletion';
        $mark->ip_address = \Request::ip();
        $mark->user_agent = \Request::header('User-Agent');
        $mark->save();

        $user->delete_on = null;
        $user->save();

        Mail::to($user->email)->send(new CancelledDeletionEmail());

        return back()->with('success', 'Your Profile is no longer marked for deletion');
    }
}
