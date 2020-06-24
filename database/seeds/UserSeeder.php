<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('secret'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('secret'),
            'role' => 0,
        ]);
    }
}
