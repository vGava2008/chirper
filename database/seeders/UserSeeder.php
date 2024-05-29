<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $superAdminRole = Role::where('name', 'sAdmin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $employeeRole = Role::where('name', 'employee')->first();
        $subscriberRole = Role::where('name', 'subscriber')->first();

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email'=>'vgava86@gmail.com',
            'phone_number' => '+380970489523',
            'password'=> Hash::make('password'),
            'admin' => true,
        ]);
        $user->roles()->attach([$superAdminRole->id]);

        $user = User::factory()->create([
            'name' => 'Owner',
            'email'=>'owner@gmail.com',
            'phone_number' => '+000000000000',
            'password'=> Hash::make('password'),
            'admin' => 0,
            'role' => 1,
        ]);
        $user->roles()->attach([$adminRole->id]);

        $user = User::factory()->create([
            'name' => 'Owner blank',
            'email'=>'owner_blank@gmail.com',
            'phone_number' => '+111111111111',
            'password'=> Hash::make('password'),
            'admin' => 0,
            'role' => 1,
        ]);
        $user->roles()->attach([$adminRole->id, $subscriberRole->id]);

        $user = User::factory()->create([
            'name' => 'Manager',
            'email'=>'manager@gmail.com',
            'phone_number' => '+34583658345',
            'password'=> Hash::make('password'),
            'admin' => 0,
            'role' => 2,
        ]);
        $user->roles()->attach([$employeeRole->id]);

        $user = User::factory()->create([
            'name' => 'User',
            'email'=>'user@gmail.com',
            'phone_number' => '+484848848484848',
            'password'=> Hash::make('password'),
            'admin' => 0,
            'role' => 10,
        ]);
        $user->roles()->attach([$subscriberRole->id]);


    }
}
