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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('price')->default(0);
            $table->integer('price_entry')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('sale')->default(0);
            $table->string('avatar')->nullable();
            $table->integer('view')->default(0);
            $table->integer('hot')->default(0)->index();
            $table->integer('status')->default(1)->index();
            $table->integer('pay')->default(0)->comment('số lượt mua');
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->integer('review_total')->default(0);
            $table->integer('review_star')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('supplier_id')->default(0);
            $table->integer('admin_id')->default(0);
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
