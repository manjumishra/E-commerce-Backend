<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
           [
               'id'=>1,
              'rolename'=>'superadmin'
           ],
           [
            'id'=>2,
           'rolename'=>'admin'
          ],
          [
            'id'=>3,
           'rolename'=>' inventory manager'
        ],
        [
            'id'=>4,
           'rolename'=>'order manager'
        ],
        [
            'id'=>5,
           'rolename'=>'customer'
        ],
        
        ]);
    }
}
