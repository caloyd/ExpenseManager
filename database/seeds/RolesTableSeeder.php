<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();

        Roles::create([
            'role_name' => 'Administrator',
            'role_description' => 'super user'
        ]);

        Roles::create([
            'role_name' => 'User',
            'role_description' => 'can add expenses'
        ]);
    }
}
