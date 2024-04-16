<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ControllerDummy extends Controller
{
    public function placeOrder()
    {
        // Insert order into the database
        $order = new Order();
        // Assuming 'customer_id' and 'food_id' are the columns in your 'orders' table
        $order->customer_id = 1; // Replace with the actual customer ID
        $order->food_id = 1; // Replace with the actual food ID
        $order->save();

        // Redirect back or return a response indicating success
        return redirect()->back()->with('success', 'Order placed successfully');
    }
}
