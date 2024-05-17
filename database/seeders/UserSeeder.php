<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'username'=>'adminuser',
                'email'=> 'admin@gmail.com',
                'role'=>'admin',
                'status'=>'active',
                'password'=>bcrypt('password'),
            ],
            [
                'name' => 'Normal User',
                'username'=>'normaluser',
                'email'=> 'normal@gmail.com',
                'role'=>'user',
                'status'=>'active',
                'password'=>bcrypt('password'),
            ]
        ]);
    }
}
