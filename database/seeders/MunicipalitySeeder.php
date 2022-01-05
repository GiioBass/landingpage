<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipalities')->insert([
            [
                'name' => 'Cali',
                'department_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Yumbo',
                'department_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Palmira',
                'department_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Medellín',
                'department_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bogotá',
                'department_id' => 1,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
