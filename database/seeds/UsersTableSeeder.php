<?php

use Illuminate\Database\Seeder;
use App\Models\BackpackUser as User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => [ 'email' => 'god@example.com' ],
                'data'  =>
                [
                    'name'	        => 'God',
                    'password'      => bcrypt('god'),
                    'enabled'		=> 1,
                ],
            ],
            [
                'email' => [ 'email' => 'admin@example.com' ],
                'data'  =>
                [
                    'name'	        => 'Admin',
                    'password'      => bcrypt('admin'),
                    'enabled'		=> 1,
                ],
            ],
        ];
        foreach ($users as $userData) {
            $user = User::firstOrCreate($userData['email'], $userData['data']);
        }
    }
}
