<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->text('description')->nullable();
            $table->string('country_of_origin');
            $table->string('state')->nullable();
            $table->decimal('abv', 5, 2);
            $table->boolean('gluten_free')->default(false);
            $table->boolean('non_alcoholic')->default(false);
            $table->unsignedBigInteger('major_category_id');
            $table->unsignedBigInteger('minor_category_id');
            $table->unsignedBigInteger('style_id');
            $table->timestamps();

            $table->foreign('major_category_id')->references('id')->on('major_categories')->onDelete('cascade');
            $table->foreign('minor_category_id')->references('id')->on('minor_categories')->onDelete('cascade');
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
