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
        User::truncate();

        User::create([
            'role_id' => 1,
            'name' => 'Carlo Edison',
            'email' => 'carloedison@example.com',
            'password' => Hash::make('password1')
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'User One',
            'email' => 'userone@example.com',
            'password' => Hash::make('password2')
        ]);
    }
}
