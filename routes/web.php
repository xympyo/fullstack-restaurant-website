<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "<h1>Anjay</h1>";
});

Route::get("/dashboard", [App\Http\Controllers\OrderDoneController::class, "orderDone"])->name("dashboard");
Route::get("/dashboard/list", [App\Http\Controllers\OrderListController::class, "orderList"])->name("dashboard.list");
Route::get("/dashboard/order_history", [App\Http\Controllers\OrderHistoryController::class, "order_history"])->name("dashboard.history");
Route::get("/dashboard/menu", [App\Http\Controllers\MenuController::class, "menu"])->name("dashboard.menu");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post("/test", [App\Http\Controllers\ControllerDummy::class, 'placeOrder'])->name("test");
