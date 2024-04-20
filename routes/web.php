<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "<h1>Anjay</h1>";
});

Route::get("/dashboard", [App\Http\Controllers\OrderDoneController::class, "orderDone"])->name("dashboard");
Route::get("/dashboard/list", [App\Http\Controllers\OrderListController::class, "orderList"])->name("dashboard.list");
Route::get("/dashboard/order_history", [App\Http\Controllers\OrderHistoryController::class, "order_history"])->name("dashboard.history");
Route::get("/dashboard/menu", [App\Http\Controllers\MenuController::class, "menu"])->name("dashboard.menu");
// dashboard create
Route::get("/dashboard/menu/store", [App\Http\Controllers\MenuEditController::class, "giveStorePage"])->name("dashboard.menu.store");
Route::post("/dashboard/menu/store", [App\Http\Controllers\MenuEditController::class, "store"])->name("dashboard.menu.store.store");
// dashboard edit
Route::get("/dashboard/menu/edit", [App\Http\Controllers\MenuEditController::class, "passData"])->name("dashboard.menu.edit");
Route::post("/dashboard/menu/edit", [App\Http\Controllers\MenuEditController::class, "edit"])->name("dashboard.menu.edit.store");


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/test", [App\Http\Controllers\ControllerDummy::class, 'placeOrder'])->name("test");
