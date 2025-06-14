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
        Schema::create('customers', function (Blueprint $table){
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('password')->nullable()->default(null);
            $table->string('phone', 20);
            $table->string('address', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('sale_orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('customer_id')->nullable()->default(null);
            $table->enum('status', ['IN_CART', 'PENDING_PAYMENT', 'PAID', 'CANCELLED'])->default('IN_CART');
            $table->decimal('total_price', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });

        /**
         * Refactorizar esto. Cambiar enfoque de productos a "vendibles"
         */
        Schema::create('sale_order_items', function (Blueprint $table) { 
            $table->id();
            $table->unsignedBigInteger('sale_order_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('quantity', 10, 2);
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('sale_orders');
        Schema::dropIfExists('sale_order_items');
    }
};
