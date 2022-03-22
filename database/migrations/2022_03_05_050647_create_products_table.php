<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_number', 50);
            $table->dateTime('product_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->string('min_price', 50);
            $table->string('max_price', 50);
            $table->string('decreasing_value', 50);
            $table->string('minutes', 50);
            $table->string('quantity', 50);
            $table->string('return_option', 50);
            $table->integer('value_status');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('mcategory_id')->constrained()->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
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
}
