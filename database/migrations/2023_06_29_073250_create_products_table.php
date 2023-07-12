<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('sort_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('sale')->nullable();
            $table->string('SKU');
            $table->string('appointment')->nullable();
            $table->string('composition')->nullable();
            $table->string('features')->nullable();
            $table->string('taking_care')->nullable();
            $table->string('landing')->nullable();
            $table->string('drawing')->nullable();
            $table->enum('stock_status', ['instock', 'outofstock']);
            $table->boolean('featured')->default(false);
            $table->boolean('saleday')->default(false);
            $table->string('image');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
