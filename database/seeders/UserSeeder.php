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
            'name' => 'Admin',
            'email'=>'vgava86@gmail.com',
            'phone' => '+380970489523',
            'password'=> Hash::make('password'),
        ]);

        User::factory(10)->create();
    }
}
