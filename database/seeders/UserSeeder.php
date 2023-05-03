<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'name' => 'Super Admin',
            'email'=>'vgava86@gmail.com',
            'phone' => '+380970489523',
            'password'=> Hash::make('password'),
            'admin' => 1,
            'role' => 0,
        ]);
        User::factory()->create([
            'name' => 'owner',
            'email'=>'owner@gmail.com',
            'phone' => '+000000000000',
            'password'=> Hash::make('password'),
            'admin' => 0,
            'role' => 1,
        ]);

        DB::table('brands')->insert([
            'user_id' => 1,
            'name' => 'Авто хім комплект',
            'description' => 'Автомобілі і запчастини, СТО',
            'website' => 'ahk.com.ua',
            'email' => 'AHK@gmail.com',
            'phone_number' => '0970090090',
        ]);
        DB::table('brands')->insert([
            'user_id' => 1,
            'name' => 'LSC',
            'description' => 'Красота і здоров`я',
            'website' => 'lsc.com.ua',
            'email' => 'LSC@gmail.com',
            'phone_number' => '3301301313',
        ]);
        DB::table('brands')->insert([
            'user_id' => 2,
            'name' => 'Спецмонтаж',
            'description' => 'Будівництво',
            'website' => 'smt.com.ua',
            'email' => 'smt@gmail.com',
            'phone_number' => '1332332332',
        ]);

    }
}
