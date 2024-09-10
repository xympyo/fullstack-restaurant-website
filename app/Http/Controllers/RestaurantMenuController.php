<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;
use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderStatus;
use App\Models\Customer;
use App\Models\DetailOrder;

class RestaurantMenuController extends Controller
{
    public function passMenu()
    {
        $category = DB::select('SELECT categories,id FROM `category`');
        $counter = DB::table('detail_order')
            ->whereNull('order_id')
            ->sum('food_qty');

        $categories = [];
        $id = [];

        foreach ($category as $cat) {
            $categories[] = $cat->categories;
            $id[] = $cat->id;
        }

        // Initialize $datas without the inner empty array
        $datas = [];
        $datas[] = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE f_category = "Food"');
        $datas[] = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE f_category = "Coffee"');
        $datas[] = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE f_category = "Non Coffee"');

        // Initialize arrays
        $ids = [];
        $fName = [];
        $fDesc = [];
        $fPrice = [];
        $fPhoto = [];

        foreach ($datas as $outerIndex => $menuItems) {
            if (empty($menuItems)) continue;
            foreach ($menuItems as $item) {
                $fName[$outerIndex][] = $item->f_name;
                $fDesc[$outerIndex][] = $item->f_description;
                $fPrice[$outerIndex][] = number_format($item->f_price, 0, ',', '.');
                $fPhoto[$outerIndex][] = $item->f_photo;
                $ids[$outerIndex][] = $item->id;
            }
        }

        return view('restaurantmenu', [
            "categories" => $categories,
            "id" => $id,
            "ids" => $ids,
            "fName" => $fName,
            "fDesc" => $fDesc,
            "fPrice" => $fPrice,
            "fPhoto" => $fPhoto,
            "counter" => $counter
        ]);
    }

    public function menuDetail($id, $name)
    {
        // dd('menuDetail called');
        $datas = DB::select('SELECT id,f_name, f_description, f_price, f_photo FROM `menu` WHERE id =?', [$id]);
        $counter = DB::table('detail_order')
            ->whereNull('order_id')
            ->sum('food_qty');

        $price = number_format($datas[0]->f_price, 0, ',', '.');

        return view('Components.RestaurantMenu.menudetail', [
            "datas" => $datas,
            "price" => $price,
            "counter" => $counter
        ]);
    }

    public function addOrder($id, Request $request)
    {
        $ids = $id;
        $finalQty = $request->input("final_qty");
        $menu = Menu::where('id', $ids)->firstOrFail();

        $detail_order = new DetailOrder();
        $detail_order->food_id = $menu->id;
        $detail_order->food_qty = $finalQty;
        $detail_order->order_id = NULL;
        $detail_order->save();

        return redirect()->route('restaurant');
    }

    public function confirmOrder()
    {
        $detail_order = DB::select("SELECT 
                                        `detail_order`.food_id, 
                                        `menu`.f_name, 
                                        `menu`.f_price, 
                                        `menu`.f_photo,
                                        `menu`.f_category,
                                        SUM(`detail_order`.food_qty) as total_qty,
                                        (SELECT COUNT(DISTINCT `food_id`) FROM `detail_order` WHERE `detail_order`.order_id IS NULL) as total_food
                                    FROM 
                                        `detail_order`
                                    JOIN 
                                        `menu` 
                                    ON 
                                        `detail_order`.food_id = `menu`.id
                                    WHERE 
                                        `detail_order`.order_id IS NULL
                                    GROUP BY 
                                        `detail_order`.food_id, 
                                        `menu`.f_name, 
                                        `menu`.f_price, 
                                        `menu`.f_photo
                                    ");

        $fQty = [];
        $fName = [];
        $fPrice = [];
        $fPhoto = [];
        $fCat = [];
        $fTotal = [];
        $totalFood = [];
        $fId = [];
        $subtotal = 0;

        function formatRupiah($amount)
        {
            if ($amount >= 100000) {
                return number_format($amount / 1000, 0, ',', '.');
            } elseif ($amount >= 10000) {
                return number_format($amount / 1000, 1, ',', '.');
            } else {
                return number_format($amount / 1000, 2, ',', '.');
            }
        }


        foreach ($detail_order as $yes) {
            $fQty[] = $yes->total_qty;
            $fName[] = $yes->f_name;
            $fId[] = $yes->food_id;
            $fPrice[] = $yes->f_price;
            $fPhoto[] = $yes->f_photo;
            $fCat[] = $yes->f_category;
            $fTotal[] = formatRupiah($yes->total_qty * $yes->f_price);
            $totalFood[] = $yes->total_food;
            $subtotal += $yes->total_qty * $yes->f_price;
        }
        $subtotal = formatRupiah($subtotal);

        return view('Components.RestaurantMenu.confirmorder', [
            "fQty" => $fQty,
            "fName" => $fName,
            "fId" => $fId,
            "fPrice" => $fPrice,
            "fPhoto" => $fPhoto,
            "fCat" => $fCat,
            "fTot" => $fTotal,
            "totalFood" => $totalFood,
            "subtotal" => $subtotal
        ]);
    }

    public function confirmOrderPost(Request $request)
    {
        $orders = DB::table('detail_order')
            ->whereNull('order_id')
            ->where('food_qty', '!=', 0)
            ->get();

        $finalId = [];
        $finalQty = [];

        foreach ($orders as $index => $yes) {
            $finalId[] = $request->input("fId-" . $index);
            $finalQty[] = $request->input("fQty-" . $index);
        }

        $order = new Order();
        $order->status_id = 1;
        $order->customer_id = null;
        $order->created_at = now();
        $order->updated_at = null;
        $order->deleted_at = null;
        $order->save();

        $order_id = $order->id;

        foreach ($orders as $index => $yes) {
            if ($finalQty[$index] == 0) {
                DB::table('detail_order')
                    ->where('food_id', $yes->food_id)
                    ->whereNull('order_id')
                    ->delete();
            } else {
                DB::table('detail_order')
                    ->where('food_id', $yes->food_id)
                    ->whereNull('order_id')
                    ->update([
                        'food_id' => $finalId[$index],
                        'food_qty' => $finalQty[$index],
                        'order_id' => $order_id
                    ]);
            }
        }

        return view("Components.RestaurantMenu.custdetail");
    }



    public function custDetail($id, Request $request)
    {
        // dd('custDetail called');
        $ids = $id;
        $finalQty = $request->input("final_qty");
        $menu = Menu::where('id', $ids)->firstOrFail();

        $detail_order = new DetailOrder();
        $order = new Order();
        $detail_order->food_id = $menu->id;
        $detail_order->food_qty = $finalQty;
        $order->status_id = 1;
        $order->customer_id = NULL;
        $order->created_at = now();
        $order->deleted_at = NULL;
        $order->updated_at = NULL;
        // dd($detail_order);
        $order->save();
        $detail_order->order_id = $order->id;
        $detail_order->save();

        return redirect()->route('restaurant.cust', ['orderId' => $order->id]);
    }

    public function passCust($orderId)
    {
        return view('Components.RestaurantMenu.custdetail', [
            "orderId" => $orderId
        ]);
    }

    public function postCust(Request $request)
    {
        $customer = new Customer();
        $customer->customer_name = $request->input('cust_name');
        $customer->customer_phone = $request->input('cust_phone_number');
        $customer->created_at = now();
        $customer->save();

        $order = Order::orderBy("id", "desc")->first();
        $order->customer_id = $customer->id;
        $order->save();
    }
}
