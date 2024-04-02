<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = "order";

    protected $dates = [
        "updated_at",
        "created_at",
        "deleted_at",
    ];

    protected $fillable = [
        "order_id",
        "cust_name",
        "cust_food_name",
        "cust_price",
        "cust_quantity",
        "cust_total",
        "updated_at",
        "created_at",
        "deleted_at"
    ];
}
