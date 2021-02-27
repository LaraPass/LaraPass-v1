<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecurityQuestionsForm;
use App\SecurityQuestions;
use Auth;
use Hash;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;

class SecurityController extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', '2fa'])->except(['disable2FAView', 'disable2FA']);
    }

    /* Disable the Security Page */
    public function index()
    {
        if (Auth::user()->security_questions == 1) {
            $google2fa = new Google2FA();
            $google2fa_url = $google2fa->getQRCodeInline(
                config('app.name'),
                Auth::user()->email,
                Auth::user()->google2fa_secret
            );

            return view('ui.security.index', ['google2fa_url' => $google2fa_url]);
        } else {
            $google2fa_url = 'Null';

            return view('ui.security.index', ['google2fa_url' => $google2fa_url]);
        }
    }

    /* Save security questions (used for disabling 2-step without GA App) */
    public function questions(SecurityQuestionsForm $request)
    {
        $questions = new SecurityQuestions($request->all());

        Auth::user()->questions()->save($questions);

        Auth::user()->security_questions = 1;

        $google2fa = new Google2FA();

        Auth::user()->google2fa_secret = $google2fa->generateSecretKey(32);

        Auth::user()->save();

        return redirect('security')->with('success', 'Security Questions Added Successfully');
    }

    /* Activate 2-Step Authentication using GA App */
    public function activate2FA(Request $request)
    {
        $messages = [
            'code.required' => 'Authentication Code is required',
            'code.numeric'  => 'The Authentication Code must be a number',
        ];

        $this->validate($request, [
            'code' => 'required|numeric',
        ], $messages);

        $google2fa = Auth::user()->google2fa_secret;

        $code = $request->input('code');

        $google2fa = new Google2FA();

        $window = 8; // 8 keys (respectively 4 minutes) past and future

        $valid = $google2fa->verifyKey(Auth::user()->google2fa_secret, $code, $window);

        if ($valid) {
            Auth::user()->two_step = 1;

            Auth::user()->save();

            $request->session()->put('2fa', $google2fa);

            return redirect('security')->with('success', '2-Step Authentication Activated Successfully');
        } else {
            return redirect('security')->withErrors(['Invalid Authentication Code']);
        }
    }

    /* Deactivate 2-Step Authentication using GA App */
    public function deactivate2FA(Request $request)
    {
        $messages = [
            'disable.required'  => 'Please select YES to diable 2-Step Authentication.',
            'disable.numeric'   => 'Selection Invalid.',
            'code.required'     => 'Google Authentication Code is required.',
            'code.numeric'      => 'The Authentication Code must be a number.',
            'password.required' => 'Password is required to disable 2-Step Authentication.',
        ];

        $this->validate($request, [
            'code'     => 'required|numeric',
            'disable'  => 'required|numeric',
            'password' => 'required',
        ], $messages);

        if (!$request->disable) {
            return redirect('security')->with('danger', 'Invalid Option Selected');
        }

        $pw = $request->password;

        if (Hash::check($pw, Auth::user()->password)) {
            $code = $request->code;

            $google2fa = new Google2FA();

            $window = 8;

            $valid = $google2fa->verifyKey(Auth::user()->google2fa_secret, $code, $window);

            if ($valid) {
                Auth::user()->two_step = 0;
                Auth::user()->save();

                return redirect('security')->with('success', '2-Step Authentication Disabled. Please re-enable for better security');
            } else {
                return redirect('security')->with('danger', 'Invalid Authentication Code');
            }
        } else {
            return redirect('security')->with('danger', 'Invalid Password');
        }
    }

    /* Authenticate & verify the user using GA App */
    public function authenticate(Request $request)
    {
        $messages = [
            'code.required' => 'Google Authentication Code is required',
            'code.numeric'  => 'The Authentication code must be a number',
        ];

        $this->validate($request, [
            'code' => 'required|numeric',
        ], $messages);

        $code = $request->code;

        $google2fa = new Google2FA();

        $window = 8;

        $valid = $google2fa->verifyKey(Auth::user()->google2fa_secret, $code, $window);

        if ($valid) {
            $request->session()->put('2fa', 1);

            return redirect('dashboard');
        } else {
            return back()->withErrors(['Invalid Authentication Code']);
        }
    }

    /* View for Disabling 2-Step Authentication without GA App */
    public function disable2FAView()
    {
        if (Auth::guest()) {
            return redirect('/')->withErrors('Login to continue');
        } else {
            $questions = SecurityQuestions::where('user_id', Auth::user()->id)->first();

            return view('ui.security.disable2FA')->with(compact('questions'));
        }
    }

    /* Disable 2-Step Authentication without using GA App */
    public function disable2FA(Request $request)
    {
        $messages = [
            'answer1.required' => 'Answer for Question #1 is required.',
            'answer2.required' => 'Answer for Question #2 is required.',
        ];

        $this->validate($request, [
            'answer1' => 'required',
            'answer2' => 'required',
        ], $messages);

        $pin = $request->support_pin;
        $answer1 = $request->answer1;
        $answer2 = $request->answer2;

        $user = Auth::user();

        if ($pin == $user->support_pin) {
            if ($answer1 == $user->questions->answer1) {
                if ($answer2 == $user->questions->answer2) {
                    $user->two_step = 0;
                    $user->save();
                    $request->session()->invalidate();

                    return redirect('/login')->with('success', '2-Step Disabled. You can now Login.');
                } else {
                    return back()->with('danger', 'Answer for Question #2 does not match our records');
                }
            } else {
                return back()->with('danger', 'Answer for Question #1 does not match our records');
            }
        } else {
            return back()->with('danger', 'Security PIN does not match our records');
        }
    }
}
