<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->count() == 0){

            DB::table('users')->insert([
                [
                    'name' => 'Admin',
                    'email' => 'admin@yopmail.com',
                    'password' => Hash::make('123456'),
                    'remember_token' => Str::random(60),
                    'role' => 1,
                    'status' => 'active'
                ],
                [
                    'name' => 'User',
                    'email' => 'user@yopmail.com',
                    'password' => Hash::make('123456'),
                    'remember_token' => Str::random(60),
                    'role' => 0,
                    'status' => 'active'
                ]
            ]);

        } else { echo "\e[Table is not empty, therefore NOT "; }
    }
}
