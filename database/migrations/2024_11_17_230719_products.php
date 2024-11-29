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
        Schema::create('products', function(Blueprint $table) {
            $table->id('id')->nullable(false)->primary();
            $table->string('name', 150)->nullable(false);
            $table->text('description')->nullable(false);
            $table->integer('price')->nullable(false)->default(0);
            $table->integer('stock')->nullable(false)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
