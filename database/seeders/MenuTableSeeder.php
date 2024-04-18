<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [[
            "f_name" => "Sushi",
            "f_description" => "Sushi is a traditional Japanese dish consisting of vinegared rice topped with various ingredients, such as raw or cooked seafood, vegetables, and sometimes tropical fruits.",
            "f_photo" => "",
            "f_rating" => null,
            "f_price" => "150000",
            "f_category" => "Tea",
            "created_at" => date("Y-m-d h:i:s"),
        ], [
            "f_name" => "Pizza Margherita",
            "f_description" => "Pizza Margherita is a classic Italian pizza topped with tomato sauce, fresh mozzarella cheese, basil leaves, and a drizzle of olive oil.",
            "f_photo" => "",
            "f_rating" => null,
            "f_price" => "120000",
            "f_category" => "Coffee",
            "created_at" => date("Y-m-d h:i:s"),
        ], [
            "f_name" => "Hamburger",
            "f_description" => "A hamburger consists of a grilled or fried patty made from ground beef, served in a bun with various toppings such as lettuce, tomato, onion, pickles, and condiments like ketchup and mustard.",
            "f_photo" => "",
            "f_rating" => null,
            "f_price" => "80000",
            "f_category" => "Non",
            "created_at" => date("Y-m-d h:i:s"),
        ], [
            "f_name" => "Pad Thai",
            "f_description" => "Pad Thai is a popular Thai stir-fried noodle dish made with rice noodles, shrimp or chicken, tofu, bean sprouts, eggs, and flavored with tamarind sauce, fish sauce, garlic, chili, and lime.",
            "f_photo" => "",
            "f_rating" => null,
            "f_price" => "50000",
            "f_category" => "Tea",
            "created_at" => date("Y-m-d h:i:s"),
        ]];
        Menu::insert($menu);
    }
}
