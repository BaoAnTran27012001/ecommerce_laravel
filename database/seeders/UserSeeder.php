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
                'firstname' => 'An',
                'lastname' => 'Tran',
                'username'=>'adminuser',
                'email'=> 'admin@gmail.com',
                'phone'=> '0356383011',
                'password'=>bcrypt('123'),
                'role_id'=>1,
            ],
            [
               'firstname' => 'Anonymous',
                'lastname' => 'Fin',
                'username'=>'normaluser',
                'email'=> 'andy@gmail.com',
                'phone'=> '',
                'password'=>bcrypt('123'),
                'role_id'=>2,
            ],
            [
                'firstname' => 'Fahasa',
                 'lastname' => 'Store',
                 'username'=>'supplier',
                 'email'=> 'fahasa@gmail.com',
                 'phone'=> '',
                 'password'=>bcrypt('123'),
                 'role_id'=>3,
             ]
        ]);
    }
}
