<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;
use App\Models\Order;

class RestaurantMenuController extends Controller
{
    public function passMenu()
    {
        $category = DB::select('SELECT categories,id FROM `category`');

        $categories = [];
        $id = [];

        foreach ($category as $cat) {
            $categories[] = $cat->categories;
            $id[] = $cat->id;
        }

        $datas = [[]];
        $datas[0][] = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE f_category = "Sandwich"');
        $datas[1][] = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE f_category = "Cake"');
        $datas[2][] = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE f_category = "Coffee"');
        $datas[3][] = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE f_category = "Non Coffee"');
        // Initialize arrays
        $ids = [];
        $fName = [];
        $fDesc = [];
        $fPrice = [];
        $fPhoto = [];

        foreach ($datas as $outerIndex => $outer) {
            foreach ($outer as $innerIndex => $inner) {
                foreach ($inner as $item) {
                    // Append to arrays
                    $fName[$outerIndex][] = $item->f_name;
                    $fDesc[$outerIndex][] = $item->f_description;
                    $fPrice[$outerIndex][] = number_format($item->f_price, 0, ',', '.');
                    $fPhoto[$outerIndex][] = $item->f_photo;
                    $ids[$outerIndex][] = $item->id;
                }
            }
        }

        return view('restaurantmenu', [
            "categories" => $categories,
            "id" => $id,
            "ids" => $ids,
            "fName" => $fName,
            "fDesc" => $fDesc,
            "fPrice" => $fPrice,
            "fPhoto" => $fPhoto
        ]);
    }

    public function menuDetail($id, $name)
    {
        // dd('menuDetail called');
        $datas = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE id =?', [$id]);

        if (!empty($datas)) {
            $price = number_format($datas[0]->f_price, 0, ',', '.');
        } else {
            $price = 0; // or some default value
        }

        return view('Components.RestaurantMenu.menudetail', [
            "datas" => $datas,
            "price" => $price
        ]);
    }

    public function custDetail($id, Request $request)
    {
        dd('custDetail called');
        $ids = $id;
        $finalQty = Request::query('final_qty');

        $order = new Order();
        $order->food_id = $ids;
        $order->customer_id = NULL;
        $order->status_id = 1;
        $order->cust_name = NULL;
        $order->customer_table = NULL;
        $order->cust_food_name = NULL;
        $order->cust_price = NULL;
        $order->cust_quantity = $finalQty;
        $order->cust_total = NULL;
        $order->cust_status = NULL;
        $order->created_at = now();
        $order->deleted_at = NULL;
        $order->updated_at = NULL;
        $order->save();

        DB::statement("
    UPDATE `order`
    JOIN `menu` ON `order`.food_id = `menu`.id
    JOIN `customer` ON `order`.customer_id = `customer`.id
    JOIN `order_status` ON `order`.status_id = `order_status`.id
    SET `order`.cust_food_name = `menu`.f_name,
    `order`.cust_price = `menu`.f_price,
    `order`.cust_total = `menu`.f_price * `order`.cust_quantity,
    `order`.cust_name = `customer`.customer_name,
    `order`.cust_status = `order_status`.`order_status`
");

        return view('Components.RestaurantMenu.custdetail', [
            'id' => $ids
        ]);
    }
}
