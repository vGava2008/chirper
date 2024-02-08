<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'service_id' => 1,
            'phone_number' => '09703333333',
        ]);
        $service = new Service();

        DB::table('employees')->insert([
            'first_name' => 'Vasya',
            'service_id' => 1,
            'phone_number' => '09703333333',
        ]);
    }
}
