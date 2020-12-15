<?php

namespace App\Http\Controllers\Install;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Encryption\Encrypter;
use App\Helpers\Install\DatabaseInstallerTrait;
use App\Helpers\Install\EnvironmentInstallerTrait;

class InstallationController extends Controller
{
	use DatabaseInstallerTrait, EnvironmentInstallerTrait;

    public function __construct()
    {
        $this->middleware(['check_if_installed'])->except('step3');
    }

    // Display the installation page
    public function index() {
   	    return view('install.index');
    }

    // Show Step 1
    public function step1()
    {
    	$key = 'base64:'.base64_encode(Encrypter::generateKey(config('cipher')));
    	return view('install.step1')->with(compact('key'));
    }

    // Save Env File
    public function step1confirm(Request $request)
    {
    	$save = $this->saveEnvFile($request);
    	if($save=='success')
    	{	
            \Artisan::call('cache:clear');
            \Artisan::call('config:clear');
    		\Artisan::call('clear-compiled');
    		return view('install.step2');
    	}
    	else
    		return back()->withErrors('Saving Env File Failed. Please check all entries and try again');
    }

    // Setting up DB
    public function step2confirm(Request $request)
    {
    	$response = $this->migrateAndSeed();
    	if($response['status']=='success')
    		return view('install.step2completed')->with(compact('response'));
    	else
    		return view('install.step2')->withErrors($response['message']);
    }

    public function step3(Request $request)
    {
        setting()->set('app_installed','1');
        setting()->save();
    	return view('install.step3');
    }
}
