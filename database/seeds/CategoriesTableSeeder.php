<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Email Account',
        ]);

        DB::table('categories')->insert([
            'name' => 'Social Media Account',
        ]);

        DB::table('categories')->insert([
            'name' => 'Bank Account',
        ]);

        DB::table('categories')->insert([
            'name' => 'Other Account',
        ]);
    }
}
