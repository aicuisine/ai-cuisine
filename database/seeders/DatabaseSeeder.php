<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MealCategory;
use App\Models\MealItem;
use App\Models\Restaurant;
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
        $users = \App\Models\User::factory(3)->create();

        foreach ($users as $index => $user) {
            $restaurantName = ['سپر وے', 'نارو وے پیزا', 'پیزا کیسل'][($index % 3)];
            $restaurant = Restaurant::create([
                'name' => $restaurantName,
                'user_id' => $user->id,
            ]);

            foreach (['سینڈوچ', 'پیزا', 'ریپس'] as $categoryName) {
                $mealCategory = MealCategory::create([
                    'name' => $categoryName,
                    'restaurant_id' => $restaurant->id,
                    'user_id' => $user->id,
                ]);

                switch ($categoryName) {
                    case 'سینڈوچ':
                        foreach (['کلب سینڈوچ'] as $mealName) {
                            MealItem::create([
                                'name' => $mealName,
                                'meal_category_id' => $mealCategory->id,
                                'restaurant_id' => $restaurant->id,
                                'user_id' => $user->id,
                            ]);
                        }
                        break;
                    case 'پیزا':
                        foreach (['ساؤتھ ویسٹرن', 'اسموکی جو', 'زیسٹی ہابانیرو'] as $mealName) {
                            MealItem::create([
                                'name' => $mealName,
                                'meal_category_id' => $mealCategory->id,
                                'restaurant_id' => $restaurant->id,
                                'user_id' => $user->id,
                            ]);
                        }
                        break;
                    case 'ریپس':
                        foreach (['چکن رول', 'کباب رول', 'بیف رول'] as $mealName) {
                            MealItem::create([
                                'name' => $mealName,
                                'meal_category_id' => $mealCategory->id,
                                'restaurant_id' => $restaurant->id,
                                'user_id' => $user->id,
                            ]);
                        }
                        break;
                }
            }
        }
    }
}
