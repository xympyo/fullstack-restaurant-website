<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dbxssipController extends Controller
{
    public function showMenu()
    {
        // Logika untuk menampilkan menu
        return view('menu');
    } 
}
