<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'Sajila',
            'email' => 'sajila@test.com',
            'phone' => '943585838',
            'usertype' => 'admin',
            'status' => 1,
            'password' => md5('admin456'), 
        ]);
    }
}
