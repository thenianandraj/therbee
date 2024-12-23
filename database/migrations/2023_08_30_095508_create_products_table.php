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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('original_rate');
            $table->integer('discount_rate');
            $table->string('image');
            $table->text('description',255);
            $table->string('keywords');
            $table->integer('add_product');
            $table->string('category');
            $table->string('subcategory')->nullable();
            $table->string('files1')->nullable();
            $table->string('files2')->nullable();
            $table->string('files3')->nullable();
            $table->string('files4')->nullable();
            $table->string('files5')->nullable();
            $table->string('files6')->nullable();
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
