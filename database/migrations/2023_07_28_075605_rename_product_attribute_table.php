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
        Schema::table('product_attribute', function (Blueprint $table) {
            //
            Schema::rename('product_attribute', 'product_attributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_attribute', function (Blueprint $table) {
            //
            Schema::rename('product_attribute', 'product_attributes');
        });
    }
};
