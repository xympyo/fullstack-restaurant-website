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
        $customerDataToday = DB::select("SELECT id, cust_name, cust_food_name, cust_quantity, customer_table, created_at, cust_total, status_id, cust_status FROM `order` WHERE DATE(created_at) = CURDATE() AND status_id != 4 AND status_id != 5");
        $customerDataAll = DB::select("SELECT id, cust_name, cust_food_name, cust_quantity, customer_table, created_at, cust_total, status_id FROM `order`");
        $customerDataPending = DB::select("SELECT id, cust_name, cust_food_name, cust_quantity, customer_table, created_at, cust_total, cust_status FROM `order` WHERE status_id = 1 AND DATE(created_at) = CURDATE()");
        $customerDataConfirmed = DB::select("SELECT id, cust_name, cust_food_name, cust_quantity, customer_table, created_at, cust_total, cust_status FROM `order` WHERE status_id = 2 AND DATE(created_at) = CURDATE()");
        $customerDataPreparing = DB::select("SELECT id, cust_name, cust_food_name, cust_quantity, customer_table, created_at, cust_total, cust_status FROM `order` WHERE status_id = 3 AND DATE(created_at) = CURDATE()");
        $customerDataCompleted = DB::select("SELECT id, cust_name, cust_food_name, cust_quantity, customer_table, created_at, cust_total, cust_status FROM `order` WHERE status_id = 4 AND DATE(created_at) = CURDATE()");
        $customerDataCancelled = DB::select("SELECT id, cust_name, cust_food_name, cust_quantity, customer_table, created_at, cust_total, cust_status FROM `order` WHERE status_id = 5 AND DATE(created_at) = CURDATE()");

        // Initialize today arrays to hold data
        $custIdToday = [];
        $custNameToday = [];
        $custFoodToday = [];
        $custQtyToday = [];
        $custTableToday = [];
        $custCreatedAtToday = [];
        $custTotalToday = [];
        $custTotalRupiahToday = [];
        $custStatusToday = [];
        // Initialize pending arrays to hold data
        $custIdPending = [];
        $custNamePending = [];
        $custFoodPending = [];
        $custQtyPending = [];
        $custTablePending = [];
        $custCreatedAtPending = [];
        $custTotalPending = [];
        $custTotalRupiahPending = [];
        $custStatusPending = [];
        // Initialize confirmed arrays to hold data
        $custIdConfirmed = [];
        $custNameConfirmed = [];
        $custFoodConfirmed = [];
        $custQtyConfirmed = [];
        $custTableConfirmed = [];
        $custCreatedAtConfirmed = [];
        $custTotalConfirmed = [];
        $custTotalRupiahConfirmed = [];
        $custStatusConfirmed = [];
        // Initialize preparing arrays to hold data
        $custIdPreparing = [];
        $custNamePreparing = [];
        $custFoodPreparing = [];
        $custQtyPreparing = [];
        $custTablePreparing = [];
        $custCreatedAtPreparing = [];
        $custTotalPreparing = [];
        $custTotalRupiahPreparing = [];
        $custStatusPreparing = [];
        // Initialize completed arrays to hold data
        $custIdCompleted = [];
        $custNameCompleted = [];
        $custFoodCompleted = [];
        $custQtyCompleted = [];
        $custTableCompleted = [];
        $custCreatedAtCompleted = [];
        $custTotalCompleted = [];
        $custTotalRupiahCompleted = [];
        $custStatusCompleted = [];
        // Initialize cancelled arrays to hold data
        $custIdCancelled = [];
        $custNameCancelled = [];
        $custFoodCancelled = [];
        $custQtyCancelled = [];
        $custTableCancelled = [];
        $custCreatedAtCancelled = [];
        $custTotalCancelled = [];
        $custTotalRupiahCancelled = [];
        $custStatusCancelled = [];

        // Populate arrays for cancelled orders
        foreach ($customerDataCancelled as $customers) {
            $custIdCancelled[] = $customers->id;
            $custNameCancelled[] = $customers->cust_name;
            $custFoodCancelled[] = $customers->cust_food_name;
            $custQtyCancelled[] = $customers->cust_quantity;
            $custTableCancelled[] = $customers->customer_table;
            $custCreatedAtCancelled[] = $customers->created_at;
            $custTotalCancelled[] = $customers->cust_total;
            // Convert from Vanilla Money to IDR
            $custTotalRupiahCancelled[] = number_format($customers->cust_total, 0, ",", ".");
            $custStatusCancelled[] = $customers->cust_status;
        }
        // Populate arrays for completed orders
        foreach ($customerDataCompleted as $customers) {
            $custIdCompleted[] = $customers->id;
            $custNameCompleted[] = $customers->cust_name;
            $custFoodCompleted[] = $customers->cust_food_name;
            $custQtyCompleted[] = $customers->cust_quantity;
            $custTableCompleted[] = $customers->customer_table;
            $custCreatedAtCompleted[] = $customers->created_at;
            $custTotalCompleted[] = $customers->cust_total;
            // Convert from Vanilla Money to IDR
            $custTotalRupiahCompleted[] = number_format($customers->cust_total, 0, ",", ".");
            $custStatusCompleted[] = $customers->cust_status;
        }
        // Populate arrays for preparing orders
        foreach ($customerDataPreparing as $customers) {
            $custIdPreparing[] = $customers->id;
            $custNamePreparing[] = $customers->cust_name;
            $custFoodPreparing[] = $customers->cust_food_name;
            $custQtyPreparing[] = $customers->cust_quantity;
            $custTablePreparing[] = $customers->customer_table;
            $custCreatedAtPreparing[] = $customers->created_at;
            $custTotalPreparing[] = $customers->cust_total;
            // Convert from Vanilla Money to IDR
            $custTotalRupiahPreparing[] = number_format($customers->cust_total, 0, ",", ".");
            $custStatusPreparing[] = $customers->cust_status;
        }
        // Populate arrays for confirmed orders
        foreach ($customerDataConfirmed as $customers) {
            $custIdConfirmed[] = $customers->id;
            $custNameConfirmed[] = $customers->cust_name;
            $custFoodConfirmed[] = $customers->cust_food_name;
            $custQtyConfirmed[] = $customers->cust_quantity;
            $custTableConfirmed[] = $customers->customer_table;
            $custCreatedAtConfirmed[] = $customers->created_at;
            $custTotalConfirmed[] = $customers->cust_total;
            // Convert from Vanilla Money to IDR
            $custTotalRupiahConfirmed[] = number_format($customers->cust_total, 0, ",", ".");
            $custStatusConfirmed[] = $customers->cust_status;
        }
        // Populate arrays for pending orders
        foreach ($customerDataPending as $customers) {
            $custIdPending[] = $customers->id;
            $custNamePending[] = $customers->cust_name;
            $custFoodPending[] = $customers->cust_food_name;
            $custQtyPending[] = $customers->cust_quantity;
            $custTablePending[] = $customers->customer_table;
            $custCreatedAtPending[] = $customers->created_at;
            $custTotalPending[] = $customers->cust_total;
            // Convert from Vanilla Money to IDR
            $custTotalRupiahPending[] = number_format($customers->cust_total, 0, ",", ".");
            $custStatusPending[] = $customers->cust_status;
        }
        // Populate arrays for today's orders
        foreach ($customerDataToday as $customers) {
            $custIdToday[] = $customers->id;
            $custNameToday[] = $customers->cust_name;
            $custFoodToday[] = $customers->cust_food_name;
            $custQtyToday[] = $customers->cust_quantity;
            $custTableToday[] = $customers->customer_table;
            $custCreatedAtToday[] = $customers->created_at;
            $custTotalToday[] = $customers->cust_total;
            // Convert from Vanilla Money to IDR
            $custTotalRupiahToday[] = number_format($customers->cust_total, 0, ",", ".");
            $custStatusToday[] = $customers->cust_status;
        }

        // Pass data to the view for today's orders
        return view("listorder", [
            // Today Data
            "custIdToday" => $custIdToday,
            "custNameToday" => $custNameToday,
            "custFoodToday" => $custFoodToday,
            "custQtyToday" => $custQtyToday,
            "custTableToday" => $custTableToday,
            "custCreatedAtToday" => $custCreatedAtToday,
            "custTotalRupiahToday" => $custTotalRupiahToday,
            "custStatusToday" => $custStatusToday,
            // Pending Data
            "custIdPending" => $custIdPending,
            "custNamePending" => $custNamePending,
            "custFoodPending" => $custFoodPending,
            "custQtyPending" => $custQtyPending,
            "custTablePending" => $custTablePending,
            "custCreatedAtPending" => $custCreatedAtPending,
            "custTotalRupiahPending" => $custTotalRupiahPending,
            "custStatusPending" => $custStatusPending,
            // Confirmed Data
            "custIdConfirmed" => $custIdConfirmed,
            "custNameConfirmed" => $custNameConfirmed,
            "custFoodConfirmed" => $custFoodConfirmed,
            "custQtyConfirmed" => $custQtyConfirmed,
            "custTableConfirmed" => $custTableConfirmed,
            "custCreatedAtConfirmed" => $custCreatedAtConfirmed,
            "custTotalRupiahConfirmed" => $custTotalRupiahConfirmed,
            "custStatusConfirmed" => $custStatusConfirmed,
            // Preparing Data
            "custIdPreparing" => $custIdPreparing,
            "custNamePreparing" => $custNamePreparing,
            "custFoodPreparing" => $custFoodPreparing,
            "custQtyPreparing" => $custQtyPreparing,
            "custTablePreparing" => $custTablePreparing,
            "custCreatedAtPreparing" => $custCreatedAtPreparing,
            "custTotalRupiahPreparing" => $custTotalRupiahPreparing,
            "custStatusPreparing" => $custStatusPreparing,
            // Completed Data
            "custIdCompleted" => $custIdCompleted,
            "custNameCompleted" => $custNameCompleted,
            "custFoodCompleted" => $custFoodCompleted,
            "custQtyCompleted" => $custQtyCompleted,
            "custTableCompleted" => $custTableCompleted,
            "custCreatedAtCompleted" => $custCreatedAtCompleted,
            "custTotalRupiahCompleted" => $custTotalRupiahCompleted,
            "custStatusCompleted" => $custStatusCompleted,
            // Confirmed Data
            "custIdCancelled" => $custIdCancelled,
            "custNameCancelled" => $custNameCancelled,
            "custFoodCancelled" => $custFoodCancelled,
            "custQtyCancelled" => $custQtyCancelled,
            "custTableCancelled" => $custTableCancelled,
            "custCreatedAtCancelled" => $custCreatedAtCancelled,
            "custTotalRupiahCancelled" => $custTotalRupiahCancelled,
            "custStatusCancelled" => $custStatusCancelled,
        ]);
    }

    public function update(Request $request)
    {
        // Retrieve the array of IDs and list of status updates
        $listIds = $request->input("index");
        $listCategories = $request->input("listUpdate");

        // Iterate through each pair of ID and status update
        foreach ($listIds as $index => $listId) {
            // Retrieve the corresponding status update for the current ID
            $listCategory = $listCategories[$index];

            if (!is_numeric($listCategory)) {
                $selectId = DB::select("SELECT `id` FROM `order_status` WHERE `order_status` = '$listCategory'");
                $selectedId = $selectId[0]->id;
                // Update the database with the new status
                $designatedDataGet = DB::update("UPDATE `order` SET `status_id` = '$selectedId' WHERE `id` = $listId");
            } else {
                $designatedDataGet = DB::update("UPDATE `order` SET `status_id` = $listCategory WHERE `id` = $listId");
                $updateTheStatus = DB::update("UPDATE `order`
                JOIN `order_status` ON `order`.status_id = `order_status`.id
                SET `order`.cust_status = `order_status`.`order_status`
                WHERE `order`.status_id = `order_status`.id");
            }
        }
        return redirect()->route("dashboard.list");
    }
}
