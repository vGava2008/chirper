<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*PARENTS*/
        // id = 1
        DB::table('categories')->insert([
            'name' => 'Будівництво / ремонт / прибирання',
            'slug' => 'budivnitstvo-remont-pribirannya',
        ]);

        // id = 2
        DB::table('categories')->insert([
            'name' => 'Логістика',
            'slug' => 'logistic',
        ]);

        // id = 3
        DB::table('categories')->insert([
            'name' => 'Будівництво',
            'slug' => 'building',
        ]);

        // id = 4
        DB::table('categories')->insert([
            'name' => 'Авто',
            'slug' => 'auto',
        ]);

        // id = 5
        DB::table('categories')->insert([
            'name' => 'Красота і здоровʼя',
            'slug' => 'krasota-i-zdorovya',
        ]);

        /*CHILDREN*/
        // id = 6
        DB::table('categories')->insert([
            'name' => 'Ремонт і обслуговування',
            'slug' => 'repair',
            'parent_id'=> '4',
        ]);

        // id = 7
        DB::table('categories')->insert([
            'name' => 'Ремонт',
            'slug' => 'repair',
            'parent_id'=> '3',
        ]);

    }
}
