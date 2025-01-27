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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 255)->nullable()->default('');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->string('name', 100);
            $table->string('description', 500)->default('');
            $table->float('price', 8, 2);
            $table->float('stock', 10, 2)->default(0);
            $table->string('unit', 20);
            $table->float('discount', 5, 2)->default(0);
            $table->unsignedBigInteger('category_id')->nullable()->default(null);
            $table->float('stock_alert_threshold', 10, 2);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

        Schema::create('inventory_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('change_type', 20);
            $table->float('quantity', 10, 2);
            $table->string('reason', 255);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('inventory_logs');
        Schema::drop('products');
        Schema::drop('categories');
    }
};
