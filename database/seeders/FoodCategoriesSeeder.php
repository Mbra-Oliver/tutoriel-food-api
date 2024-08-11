<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Import Carbon library for now() function

class FoodCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $datas = [
            [
                'name' => 'P\'tit dej',
                'default_image' => 'default/images/categories/english-breakfast.png',
            ],
            [
                'name' => 'Dejeuner',
                'default_image' => 'default/images/categories/fried-rice.png'
            ],
            [
                'name' => 'Dîner',
                'default_image' => 'default/images/categories/christmas-dinner.png'
            ],
            [
                'name' => 'Desserts',
                'default_image' => 'default/images/categories/sweet.png'
            ],
            [
                'name' => 'Boissons',
                'default_image' => 'default/images/categories/beer.png'
            ],
            [
                'name' => 'Soupes',
                'default_image' => 'default/images/categories/hot-soup.png'
            ],
            [
                'name' => 'Salades',
                'default_image' => 'default/images/categories/salad.png'
            ],
            [
                'name' => 'Plats complets',
                'default_image' => 'default/images/categories/food-cover.png'
            ],
        ];

        foreach ($datas as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'default_image' => $category['default_image'],
                'created_at' => Carbon::now(), // Use Carbon::now() for timestamps
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
