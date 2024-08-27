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
        $counter = DB::table('detail_order')->sum('food_qty');

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
        $counter = DB::table('detail_order')->sum('food_qty');

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

    public function postCust($orderId, Request $request)
    {
        $orderIds = $orderId;
        $custName = $request->input('cust_name');
        $custPhone = $request->input('cust_phone_number');
        $customer = new Customer();
        $customer->customer_name = $custName;
        $customer->customer_phone = $custPhone;
        $customer->created_at = now();
        $customer->save();

        $order = Order::where('id', $orderIds)->firstOrFail();
        $customerId = $customer->id;
        $order->customer_id = $customerId;
        $order->cust_name = $custName;
        $order->customer_table = NULL;
        $order->save();
    }
}
