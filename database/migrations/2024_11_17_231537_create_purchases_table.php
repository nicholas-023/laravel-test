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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('purchased_item_id')->nullable(false);
            $table->bigInteger('total_purchased_item')->nullable(false);
            $table->timestamp('created_at')->nullable(false)->useCurrent();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('purchased_item_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
