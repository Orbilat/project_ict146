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
            'username'  => 'tester',
            'password'  => bcrypt('tester'),
            'employeeName' => 'Test Admin',
            'position'  => 'Admin',
            'idNumber'  => '14102706',
            'licenseNumber' => '14102706',
            'userType'  => 'administrator',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
