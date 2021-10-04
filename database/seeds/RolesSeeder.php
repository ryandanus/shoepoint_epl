<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into roles values (?, ?, ?, ?)', [1, 'user', NULL, NULL]);
        DB::insert('insert into roles values (?, ?, ?, ?)', [2, 'admin', NULL, NULL]);
        DB::insert('insert into roles values (?, ?, ?, ?)', [3, 'superadmin', NULL, NULL]);
    }
}
