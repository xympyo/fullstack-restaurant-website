<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = "order_status";

    protected $dates = [
        "updated_at",
        "created_at",
        "deleted_at",
    ];

    protected $fillable = [
        "order_id",
        "status",
        "updated_at",
        "created_at",
        "deleted_at"
    ];
}
