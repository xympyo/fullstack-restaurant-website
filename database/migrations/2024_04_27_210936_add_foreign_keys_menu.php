<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("menu", function (Blueprint $table) {
            // from menu to customer
            $table->foreign("category_id", "fk_menu_to_customer")->references("id")->on("category")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("menu", function (Blueprint $table) {
            $table->dropForeign("fk_menu_to_customer");
        });
    }
};
