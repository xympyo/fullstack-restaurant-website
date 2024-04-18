<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function menu()
    {
        $menu = DB::select("SELECT id,f_name,f_description,f_photo,f_price,created_at
        FROM menu");
        $menuId = [];
        $menuName = [];
        $menuDescription = [];
        $menuPhoto = [];
        $menuPrice = [];
        foreach ($menu as $menus) {
        }

        return view("menu");
    }
}
