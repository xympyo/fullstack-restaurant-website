<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class MenuEditController extends Controller
{
    public function passData(Request $request)
    {
        $menuId = $request->query('id');

        $data = DB::select('SELECT f_name, f_description, f_price, f_category
        FROM `menu` WHERE id = ?', [$menuId]);

        $f_names = $data[0]->f_name;
        $f_desc = $data[0]->f_description;
        $f_price = $data[0]->f_price;
        $f_category = $data[0]->f_category;

        return view("Components.Menu.menuedit", [
            "f_names" => $f_names,
            "f_desc" => $f_desc,
            "f_price" => $f_price,
            "f_category" => $f_category,
            'menuId' => $menuId
        ]);
    }

    public function giveStorePage()
    {

        return view("Components.Menu.menustore");
    }
    public function store(Request $request)
    {
        $foodName = $request->input('foodName');
        $foodDesc = $request->input('foodDesc');
        $foodPrice = $request->input('foodPrice');
        $foodCategory = $request->input('foodCategory');

        $data = $request->validate([
            'foodName' => 'required',
            'foodDesc' => 'nullable',
            'foodPrice' => 'required'
        ]);
        $data['f_name'] = $data['foodName'];
        $data['f_description'] = $data['foodDesc'];
        $data['f_price'] = $data['foodPrice'];
        $data['f_category'] = $foodCategory;

        unset($data['foodName'], $data['foodDesc'], $data['foodPrice']);
        $data['created_at'] = now();

        $newProduct = Menu::create($data);

        return redirect()->route('dashboard.menu');
    }

    public function edit()
    {
    }
}
