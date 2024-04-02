<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = "customer";

    protected $dates = [
        "updated_at",
        "created_at",
        "deleted_at",
    ];

    protected $fillable = [
        "customer_name",
        "customer_phone",
        "updated_at",
        "created_at",
        "deleted_at"
    ];
}
