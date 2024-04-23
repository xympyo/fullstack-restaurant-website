<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    public function index()
    {
        $menu = DB::select("SELECT 
        f_name, 
        f_description, 
        FORMAT(f_price, 0) AS formatted_price, 
        f_category 
    FROM 
        `menu` 
    WHERE 
        deleted_at IS NULL 
    LIMIT 4;");

        if (!$menu) {
            // Error handling: Handle the case when no data is retrieved from the database
            // You can log the error, return an error message, or handle it according to your application's logic
            // For now, let's assume you want to return an empty array for all variables
            $fName = [];
            $fDesc = [];
            $fPrice = [];
            $fCategory = [];
        } else {
            // If data is retrieved successfully, populate the arrays
            foreach ($menu as $menus) {
                $fName[] = $menus->f_name;
                $fDesc[] = $menus->f_description;
                $fPrice[] = $menus->formatted_price;
                $fCategory[] = $menus->f_category;
            }
        }

        return view('LandingIndex', [
            "fName" => $fName,
            "fDesc" => $fDesc,
            "fPrice" => $fPrice,
            "fCategory" => $fCategory
        ]);
    }

    public function team()
    {
        return view('Landingpage.Team');
    }

    public function about()
    {
        return view('Landingpage.AboutUs');
    }
}
