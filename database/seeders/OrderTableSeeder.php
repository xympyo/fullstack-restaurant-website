<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = [
            [
                "food_id" => 4,
                "customer_id" => 4,
                "status_id" => null,
                "cust_name" => null,
                "customer_table" => 2,
                "cust_food_name" => null,
                "cust_price" => null,
                "cust_quantity" => 3,
                "cust_total" => null,
            ],
            [
                "food_id" => 1,
                "customer_id" => 1,
                "status_id" => null,
                "cust_name" => null,
                "customer_table" => 3,
                "cust_food_name" => null,
                "cust_price" => null,
                "cust_quantity" => 2,
                "cust_total" => null,
            ]
        ];
        Order::insert($order);
    }
}
