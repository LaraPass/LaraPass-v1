<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Account' => 'App\Policies\AccountPolicy',
        'App\Folder' => 'App\Policies\FolderPolicy',
        'App\QuickNote' => 'App\Policies\QuickNotePolicy',
        'App\AccountNote' => 'App\Policies\AccountNotePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
