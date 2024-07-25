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
        "customer_id",
        "status_id",
        "updated_at",
        "created_at",
        "deleted_at"
    ];

    // one to one from order to experience
    public function experience()
    {
        return $this->belongsTo("App\Models\Experience", "id", "experience_id");
    }

    // one to one from order to order_status
    public function order_status()
    {
        return $this->belongsTo("App\Models\Customer", "status_id", "id");
    }

    // one to one from order to order_history
    public function order_history()
    {
        return $this->belongsTo("App\Models\OrderHistory", "status_id", "order_id");
    }

    // many to one from order to customer
    public function customer()
    {
        return $this->belongsTo("App\Models\Customer", "customer_id", "id");
    }

    // one to one from order to detail_order
    public function detail_order()
    {
        return $this->belongsTo("App\Models\DetailOrder", "id", "order_id");
    }
}
