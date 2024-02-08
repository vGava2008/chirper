<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new Service([
            'user_id' => 1,
            'brand_id' => 4,
            'name' => 'Грузоперевозка',
            'description' => 'До 3 тонн',
            'phone_numbers' => '{"0": "+61489921018", "1": "0507474797"}',
            'web_pages' => '{"0": "www.google.vom"}',
            'socials' => '{"facebook": "www.facebook.com", "instagram": "www.instagram.com"}',
        ]);
        $category = Category::find('2');
        $category->services()->save($service);

        $service = Service::create([
            'user_id' => 1,
            'brand_id' => 1,
            'category_id' => 5,
            'name' => 'Технічне обслуговування автомобілів',
            'description' => 'Комп`ютерна діагностика ходової частини, кузовний ремонт, малярка',
            'phone_numbers' => '{"0": "+2029182132", "1": "+15058714329"}',
            'web_pages' => '{"0": "www.sdfsdfsdfsdfs.vom"}',
            'socials' => '{"facebook": "www.facebook.com", "instagram": "www.instagram.com"}',
        ]);
        $category = Category::find('4');
        $category->services()->save($service);

        $service = Service::create([
            'user_id' => 2,
            'brand_id' => 3,
            'category_id' => 7,
            'name' => 'Будівництво і монтаж спеціальних споруд',
            'description' => 'Будівництво, монтаж і ремонт спеціальних споруд',
            'phone_numbers' => '{"0": "+84848486634", "1": "+32345553463"}',
            'web_pages' => '{"0": "www.secmontage.vom"}',
            'socials' => '{"facebook": "www.facebook.com/secmontage", "instagram": "www.instagram.com/secmontage"}',
        ]);
        $category = Category::find('3');
        $category->services()->save($service);

        $service = Service::create([
            'user_id' => 1,
            'name' => 'Камуфляж Рубцов и шрамов',
            'description' => 'Позволяет при помощи цветовой коррекции скрыть эстетические недостаткитравмированной кожи полученные в результате ожогов, различных травм, хирургического вмешательства и т.д.',
            'phone_numbers' => '{"0": "+84848486634", "1": "+32345553463"}',
            'web_pages' => '{"0": "0660680780"}',
            'meta' => '{"telegram": "@Tsukerochkaaa"}',
        ]);
        $category = Category::find('5');
        $category->services()->save($service);
    }
}
