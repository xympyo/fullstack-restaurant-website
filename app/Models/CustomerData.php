<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerData extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = "customer_data";

    protected $dates = [
        "updated_at",
        "created_at",
        "deleted_at",
    ];

    protected $fillable = [
        "name",
        "phone_number",
        "updated_at",
        "created_at",
        "deleted_at"
    ];
}
