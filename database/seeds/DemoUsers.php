<?php

use Illuminate\Database\Seeder;

class DemoUsers extends Seeder
{
    /**
     * Local Testing Seeder. DO NOT USE IN PRODUCTION ENVIRONMENT
     */
    public function run()
    {
        factory(App\User::class, 50)->create();
    }
}
