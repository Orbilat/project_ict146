<?php

use DateTime;
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
            'stationName' => 'Station 1',
            'managedBy' => 'Test Admin',
            'managedDate' => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('stations')->insert([
            'stationName'  => 'Station 2',
            'managedBy' => 'Test Admin',
            'managedDate' => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('stations')->insert([
            'stationName'  => 'Station 3',
            'managedBy' => 'Test Admin',
            'managedDate' => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
