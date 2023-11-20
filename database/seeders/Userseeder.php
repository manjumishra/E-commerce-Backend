<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'firstname'=>'Admin',
           'lastname'=>'admin',
           'email'=>'admin@gmail.com',
           'password'=>Hash::make('admin@123'),
           'confirm_password'=>Hash::make('admin@123'),
           'role_id'=>2,
           'status'=>'active',
        ]);
    }
}
