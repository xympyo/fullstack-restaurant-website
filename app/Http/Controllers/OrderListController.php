<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderListController extends Controller
{
    public function orderList()
    {
        // Fetch data for today's orders, all orders, and pending orders
        $customerDataToday = DB::select("SELECT 
                                        `order`.id,
                                        `customer`.customer_name,
                                        `menu`.f_name,
                                        `detail_order`.food_qty,
                                        `order`.created_at,
                                        `menu`.f_price * `detail_order`.food_qty AS total_price,
                                        `order`.status_id,
                                        `order_status`.order_status
                                        FROM
                                        `order`
                                        JOIN `detail_order` ON `order`.id = `detail_order`.order_id
                                        JOIN `menu` ON `detail_order`.food_id = `menu`.id
                                        JOIN `customer` ON `customer`.id = `order`.customer_id
                                        JOIN `order_status` ON `order_status`.id = `order`.status_id
                                        WHERE
                                        DATE(`order`.created_at) = CURDATE()
                                        AND 
                                        `order`.status_id != 4
                                        AND
                                        `order`.status_id != 5");
        // Initialize today arrays to hold data
        $dataId = [];
        $custIdToday = [];
        $custNameToday = [];
        $custFoodToday = [];
        $custQtyToday = [];
        $custCreatedAtToday = [];
        $custTotalToday = [];
        $custTotalRupiahToday = [];
        $custStatusToday = [];
        $custStatusId = [];
        $numbers = [];
        $a = 1;

        foreach ($customerDataToday as $index => $customers) {
            $dataId[] = $customers->id;
            $custNameToday[] = $customers->customer_name;
            $custFoodToday[] = $customers->f_name;
            $custQtyToday[] = $customers->food_qty;
            $custCreatedAtToday[] = $customers->created_at;
            $custTotalToday[] = $customers->total_price;
            // Convert from Vanilla Money to IDR
            $custTotalRupiahToday[] = number_format($customers->total_price, 0, ",", ".");
            $custStatusToday[] = $customers->order_status;
            $custStatusId[] = $customers->status_id;
            $numbers[] = $a;
            if ($index > 0 && $dataId[$index] == $dataId[$index - 1]) {
                $a++;
            } else {
            }
        }

        // Pass data to the view for today's orders
        return view("listorder", [
            // Today Data
            "dataId" => $dataId,
            "dataOrderStatus" => $custStatusId,
            "dataNumber" => $numbers,
            "custIdToday" => $custIdToday,
            "dataCustName" => $custNameToday,
            "dataFoodName" => $custFoodToday,
            "dataFoodQty" => $custQtyToday,
            "dataCreatedAt" => $custCreatedAtToday,
            "dataFoodSubtotal" => $custTotalRupiahToday,
            "custStatusToday" => $custStatusToday,
        ]);
    }

    public function update(Request $request)
    {
        $listIds = $request->input("index");
        $listCategories = $request->input("listUpdate");

        // dd($listCategories);
        foreach ($listIds as $index => $listId) {
            $listCategory = $listCategories[$index];
            // dd($listCategory);

            if (!is_numeric($listCategory)) {
                $selectId = DB::select("SELECT `id` FROM `order_status` WHERE `order_status` = '$listCategory'");
                $selectedId = $selectId[0]->id;
                // Update the database with the new status
                $designatedDataGet = DB::update("UPDATE `order` SET `status_id` = '$selectedId' WHERE `id` = $listId");
            } else {
                $designatedDataGet = DB::update("UPDATE `order` SET `status_id` = $listCategory WHERE `id` = $listId");
            }
        }
        return redirect()->route("dashboard.list");
    }
}
