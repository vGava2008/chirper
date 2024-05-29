<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'user_id' => 1,
            'name' => 'Авто хім комплект',
            'category_id' => 4,
            'description' => 'Автомобілі і запчастини, СТО',
            'website' => 'ahk.com.ua',
            'email' => 'AHK@gmail.com',
            'phone_number' => '0970090090',
        ]);

        DB::table('brands')->insert([
            'user_id' => 1,
            'name' => 'LSC',
            'category_id' => 1,
            'description' => 'Красота і здоров`я',
            'website' => 'lsc.com.ua',
            'email' => 'LSC@gmail.com',
            'phone_number' => '3301301313',
        ]);

        DB::table('brands')->insert([
            'user_id' => 2,
            'name' => 'Спецмонтаж',
            'category_id' => 3,
            'description' => 'Будівництво',
            'website' => 'smt.com.ua',
            'email' => 'smt@gmail.com',
            'phone_number' => '1332332332',
        ]);

        DB::table('brands')->insert([
            'user_id' => 1,
            'name' => 'Фірма Петрович',
            'category_id' => 2,
            'description' => 'Логістика',
            'website' => 'petrovich.com.ua',
            'email' => 'petrovich@gmail.com',
            'phone_number' => '+31332332332',
        ]);
    }
}
