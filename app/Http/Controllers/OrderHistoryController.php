<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderHistoryController extends Controller
{
    public function order_history()
    {
        $customerDataCompleted = DB::select("SELECT
                                                `order`.id,
                                                `customer`.customer_name,
                                                `customer`.customer_phone,
                                                `menu`.f_name,
                                                `detail_order`.food_qty,
                                                `menu`.f_price * `detail_order`.food_qty AS total_price,
                                                `order`.created_at
                                            FROM
                                                `order`
                                            JOIN 
                                                `customer` ON `order`.customer_id = `customer`.id
                                            JOIN 
                                                `detail_order` ON `order`.id = `detail_order`.order_id
                                            JOIN 
                                                `menu` ON `detail_order`.food_id = `menu`.id
                                            WHERE 
                                                `order`.status_id = 4;
                                            ");
        $custId = [];
        $custName = [];
        $custPhone = [];
        $custFood = [];
        $custQty = [];
        $custDate = [];
        $custTotal = [];
        $custTotalRupiah = [];

        foreach ($customerDataCompleted as $customers) {
            $custId[] = $customers->id;
            $custName[] = $customers->customer_name;
            $custPhone[] = $customers->customer_phone;
            $custFood[] = $customers->f_name;
            $custQty[] = $customers->food_qty;
            $custDate[] = $customers->created_at;
            $custTotal[] = $customers->total_price;
            $custTotalRupiah[] = number_format($customers->total_price, 0, ",", ".");
        }

        return view("orderhistory", [
            "custId" => $custId,
            "custName" => $custName,
            "custPhone" => $custPhone,
            "custFood" => $custFood,
            "custQty" => $custQty,
            "custDate" => $custDate,
            "custTotalRupiah" => $custTotalRupiah
        ]);
    }
}
