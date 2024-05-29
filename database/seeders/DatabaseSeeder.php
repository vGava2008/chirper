<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([RolesSeeder::class]);
         $this->call([UserSeeder::class]);
         $this->call([CategorySeeder::class]);
         $this->call([BrandsSeeder::class]);
         $this->call([ServicesSeeder::class]);
//         $this->call([EmployeesSeeder::class]);
    }
}
