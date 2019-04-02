<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'username'  => 'tester',
                'password'  => bcrypt('tester'),
                'employeeName' => 'Test Admin',
                'position'  => 'Admin',
                'idNumber'  => '14102706',
                'licenseNumber' => '14102706',
                'userType'  => 'administrator',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'username'  => 'secretary',
                'password'  => bcrypt('secretary'),
                'employeeName' => 'The Secretary',
                'position'  => 'Secretary',
                'idNumber'  => '14102707',
                'licenseNumber' => '14102707',
                'userType'  => 'secretary',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'username'  => 'analyst',
                'password'  => bcrypt('analyst'),
                'employeeName' => 'The Analyst',
                'position'  => 'Analyst',
                'idNumber'  => '14102708',
                'licenseNumber' => '14102708',
                'userType'  => 'analyst',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);
    }
}
