<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Jahidul',
            'last_name' => 'Islam',
            'email' => 'jahidul.islam114593@gmail.com',
            'password' => md5('1234'),
            'role' => 'Admin',
            'status' => true
            
        ]);
    }
}
