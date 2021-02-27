<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'          => 'admin',
            'name'              => 'Larapass Admin',
            'email'             => 'adminDefault@larapass.net',
            'email_verified_at' => Now(),
            'type'              => 'admin',
            'rng_level'         => 2,
            'support_pin'       => 2323,
            'password'          => Hash::make('larapass@admin'),
            'created_at'        => Now(),
        ]);
    }
}
