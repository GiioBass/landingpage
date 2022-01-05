<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'name' => 'Valle del cauca',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Antioquia',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'Bogotá DC',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
