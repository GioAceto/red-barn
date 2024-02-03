<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizesTable extends Migration
{
    public function up()
    {
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('sku')->unique();
            $table->unsignedBigInteger('size_id'); // Add size_id column
            $table->boolean('is_default_size')->default(false);
            $table->decimal('price', 8, 2);
            $table->boolean('allocated')->default(false);
            $table->boolean('deal')->default(false);
            $table->decimal('deal_price', 8, 2)->nullable();
            $table->boolean('special')->default(false);
            $table->string('special_id')->nullable();
            $table->boolean('trending')->default(false);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade'); // Add foreign key for size
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_sizes');
    }
}
