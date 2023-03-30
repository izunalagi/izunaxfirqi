<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
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
                'name' => 'staff',
                'email' => 'staff@example.com',
                'type' => 1,
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'owner',
                'email' => 'owner@example.com',
                'type' => 2,
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'type' => 0,
                'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
