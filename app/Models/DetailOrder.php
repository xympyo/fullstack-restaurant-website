<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailOrder extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = "detail_order";

    protected $fillable = [
        "order_id",
        "food_id",
    ];

    // one to one from detail_order to order
    public function order()
    {
        return $this->belongsTo("App\Models\Order", "order_id", "id");
    }
    // one to many from detail_order to menu
    public function menu()
    {
        return $this->belongsTo("App\Models\Menu", "food_id", "id");
    }
}
