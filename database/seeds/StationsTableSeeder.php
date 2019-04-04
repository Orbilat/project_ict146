<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stations')->insert([
            [
                'stationName' => 'Station 1',
                'managedBy' => 'Test Admin',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'stationName'  => 'Station 2',
                'managedBy' => 'Test Admin',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'stationName'  => 'Station 3',
                'managedBy' => 'Test Admin',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);
    }
}