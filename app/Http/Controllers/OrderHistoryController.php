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
        `order`.cust_name,
        `customer`.customer_phone,
        `order`.cust_food_name,
        `order`.cust_quantity,
        `order`.customer_table,
        `order`.created_at,
        `order`.cust_total
    FROM 
        `order`
    JOIN 
        `customer` ON `order`.customer_id = `customer`.id
        WHERE `order`.status_id = 4
    ");
        $custId = [];
        $custName = [];
        $custPhone = [];
        $custFood = [];
        $custQty = [];
        $custTable = [];
        $custDate = [];
        $custTotal = [];


        foreach ($customerDataCompleted as $customers) {
            $custId[] = $customers->id;
            $custName[] = $customers->cust_name;
            $custPhone[] = $customers->customer_phone;
            $custFood[] = $customers->cust_food_name;
            $custQty[] = $customers->cust_quantity;
            $custTable[] = $customers->customer_table;
            $custDate[] = $customers->created_at;
            $custTotal[] = $customers->cust_total;
            $custTotalRupiah[] = number_format($customers->cust_total, 0, ",", ".");
        }

        return view("orderhistory", [
            "custId" => $custId,
            "custName" => $custName,
            "custPhone" => $custPhone,
            "custFood" => $custFood,
            "custQty" => $custQty,
            "custTable" => $custTable,
            "custDate" => $custDate,
            "custTotalRupiah" => $custTotalRupiah
        ]);
    }
}
