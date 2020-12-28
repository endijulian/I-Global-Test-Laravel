<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin I-Global',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'level_id' => 1,
            'password' => bcrypt('secret')

        ]);

        User::create([
            'name' => 'Employee I-Global',
            'username' => 'employee',
            'email' => 'employee@gmail.com',
            'level_id' => 2,
            'password' => bcrypt('secret')

        ]);
    }
}
