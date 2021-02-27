<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LaravelShortcuts extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', '2fa', 'is_admin']);
    }

    public function mainDown()
    {
        \Artisan::call('down');
        setting()->set('app_status', 'down');
        setting()->save();

        return back()->with('success', 'Maintenance Mode Activated');
    }

    public function mainUp()
    {
        \Artisan::call('up');
        setting()->set('app_status', 'up');
        setting()->save();

        return back()->with('success', 'Maintenance Mode Deactivated');
    }

    // Clear Cache File
    public function clearCache()
    {
        \Artisan::call('cache:clear');

        return back()->with('success', 'Cache File Cleared');
    }

    // Clear View File
    public function clearView()
    {
        \Artisan::call('view:clear');

        return back()->with('success', 'View Files Cleared');
    }

    // Clear Routes File
    public function clearRoute()
    {
        \Artisan::call('route:clear');

        return back()->with('success', 'Routes File Cleared');
    }

    // Clear Config File
    public function clearConfig()
    {
        \Artisan::call('config:clear');

        return back()->with('success', 'Config File Cleared');
    }

    // Clear Compiled Files
    public function clearCompiled()
    {
        \Artisan::call('clear-compiled');

        return back()->with('success', 'Cleared All Compiled Files');
    }
}
