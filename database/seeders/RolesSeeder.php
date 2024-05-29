<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'sAdmin',
            'nice_name' => 'Super Admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'nice_name' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'employee',
            'nice_name' => 'Employee',
        ]);

        DB::table('roles')->insert([
            'name' => 'subscriber',
            'nice_name' => 'Subscriber',
        ]);
    }
}
