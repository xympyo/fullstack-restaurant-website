<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function menu()
    {
        $menu = DB::select("SELECT id, f_name, f_description, f_photo, f_price, DATE(created_at) as created_date FROM menu");

        $menuId = [];
        $menuName = [];
        $menuDescription = [];
        $menuPhoto = [];
        $menuPrice = [];
        $menuDate = [];

        foreach ($menu as $menus) {
            $menuId[] = $menus->id;
            $menuName[] = $menus->f_name;
            $menuDescription[] = $menus->f_description;
            $menuPhoto[] = $menus->f_photo;
            $menuPrice[] = $menus->f_price;
            $menuDate[] = $menus->created_date; // Use the extracted date column
        }

        return view("menu", [
            "menuId" => $menuId,
            "menuName" => $menuName,
            "menuDescription" => $menuDescription,
            "menuPhoto" => $menuPhoto,
            "menuPrice" => $menuPrice,
            "menuDate" => $menuDate
        ]);
    }
}
