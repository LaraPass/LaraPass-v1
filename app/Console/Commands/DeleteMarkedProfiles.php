<?php

namespace App\Console\Commands;

use App\Mail\AccountDeletedEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DeleteMarkedProfiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'profiles:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete All Profiles Marked for Deletion';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();
        foreach($users as $user)
        {
            if(! $user->delete_on == null)
            {
                if(Carbon::now() > $user->delete_on )
                {
                    Mail::to($user->email)->send(new AccountDeletedEmail($user));
                    $user->delete();
                }
            }            
        }

        $this->info('Checked and deleted any pending profiles marked for deletion');
    }
}
