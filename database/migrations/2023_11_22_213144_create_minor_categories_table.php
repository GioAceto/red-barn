<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinorCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('minor_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('major_category_id');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('major_category_id')->references('id')->on('major_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('minor_categories');
    }
}
