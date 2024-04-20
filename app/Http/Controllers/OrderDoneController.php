<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderServices;
use Illuminate\Support\Facades\DB;


class OrderDoneController extends Controller
{
    public function orderDone()
    {
        // Fetch all distinct dates from the orders table
        $distinctDates = DB::table('order')
            ->select(DB::raw('DATE(created_at) as date'))
            ->distinct()
            ->pluck('date');

        // Initialize an empty array to store the result
        $orderQuantitiesPerDay = [];
        $orderMax = 0;

        // Iterate over distinct dates
        foreach ($distinctDates as $date) {
            // Count orders for each date
            $orderCount = DB::table('order')
                ->whereDate('created_at', $date)
                ->count();

            // Store date and order count in the result array
            $orderQuantitiesPerDay[$date] = $orderCount;
            // Sum orders
            $orderMax += $orderCount;
        }
        $orderTotal = count($orderQuantitiesPerDay);
        if ($orderTotal != 0) {
            $averageOrder = $orderMax / $orderTotal;
        } else {
        }

        $numberDoneToday = DB::select('SELECT COUNT(*) as count FROM `order` WHERE DATE(created_at) = CURDATE()');
        $numberDoneYesterday = DB::select('SELECT COUNT(*) as count FROM `order` WHERE DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)');
        $moneyGainedToday = DB::select('SELECT cust_total FROM `order` WHERE DATE(created_at) = CURDATE()');
        $check = DB::select('SELECT * FROM `order`');

        // foreach money gained today
        $moneyTotalToday = 0;
        foreach ($moneyGainedToday as $moneys) {
            $moneyTotalToday += $moneys->cust_total;
        }
        $rupiah = number_format($moneyTotalToday, 0, ",", ".");

        if ($check == NULL) {
        } else {
            $averageToday = (($numberDoneToday[0]->count - $averageOrder) / $averageOrder) * 100;
            $averageYesterday = (($numberDoneYesterday[0]->count - $averageOrder) / $averageOrder) * 100;
        }

        // return data
        if ($check == NULL) {
            return view("dashboard");
        } else {
            return view("dashboard", [
                'numberDoneToday' => $numberDoneToday[0]->count,
                'numberDoneYesterday' => $numberDoneYesterday[0]->count,
                'averageToday' => $averageToday,
                'averageYesterday' => $averageYesterday,
                'moneyTotalToday' => $rupiah
            ]);
        }
    }
}
