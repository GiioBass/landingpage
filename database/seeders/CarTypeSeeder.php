<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_types')->insert([
            [
                'name' => 'Nueva Rexton',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Rexton G4',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Rexton Sport',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Trivoli',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Korando',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'XLV',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
