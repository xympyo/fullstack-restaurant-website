<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "<h1>Anjay</h1>";
});

Route::get("/dashboard", [App\Http\Controllers\OrderDoneController::class, "orderDone"]);
Route::get("/dashboard/list", function () {
    return view("listorder");
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post("/test", [App\Http\Controllers\ControllerDummy::class, 'placeOrder'])->name("test");
