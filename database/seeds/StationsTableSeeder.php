<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Station;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::insert([
            [
                'stationName' => 'Metal',
                'managedBy' => 'Administrator',
                'managedDate' => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'stationName'  => 'Environmental',
                'managedBy' => 'Administrator',
                'managedDate' => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'stationName'  => 'Micro',
                'managedBy' => 'Administrator',
                'managedDate' => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);
    }
}
