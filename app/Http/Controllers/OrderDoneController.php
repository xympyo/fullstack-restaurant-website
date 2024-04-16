<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderServices;
use Illuminate\Support\Facades\DB;


class OrderDoneController extends Controller
{
    public function orderDone()
    {
        $numberDoneToday = DB::select('SELECT COUNT(*) as count FROM `order` WHERE DATE(created_at) = CURDATE()');
        $numberDoneYesterday = DB::select('SELECT COUNT(*) as count FROM `order` WHERE DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)');
        return view("dashboard", [
            'numberDoneToday' => $numberDoneToday[0]->count,
            'numberDoneYesterday' => $numberDoneYesterday[0]->count
        ]);
    }
    public function getOrderQuantitiesPerDay()
    {
        // Fetch all distinct dates from the orders table
        $distinctDates = DB::table('order')
            ->select(DB::raw('DATE(created_at) as date'))
            ->distinct()
            ->pluck('date');

        // Initialize an empty array to store the result
        $orderQuantitiesPerDay = [];

        // Iterate over distinct dates
        foreach ($distinctDates as $date) {
            // Count orders for each date
            $orderCount = DB::table('order')
                ->whereDate('created_at', $date)
                ->count();

            // Store date and order count in the result array
            $orderQuantitiesPerDay[$date] = $orderCount;
        }

        return $orderQuantitiesPerDay;
    }
}
