<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
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
                'name'=>'Administrador',
                'guard_name'=> 'sanctum'
            ],
            [
                'name'=>'Cliente',
                'guard_name'=> 'sanctum'
            ],
        ]);
    }
}
