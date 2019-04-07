<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::insert([
            [
                'username'  => 'tester',
                'password'  => Hash::make('tester'),
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
                'password'  => Hash::make('secretary'),
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
                'password'  => Hash::make('analyst'),
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
