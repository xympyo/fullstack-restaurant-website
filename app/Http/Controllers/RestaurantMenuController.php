<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantMenuController extends Controller
{
    public function passMenu()
    {
        return view('menu.restaurantmenupage');
    }
}
