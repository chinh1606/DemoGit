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
            $table->string("name", 255);
            $table->string("code", 255)->unique();
            $table->string("slug", 255);
            $table->string("info", 255);
            $table->string("describer", 255);
            $table->string("image", 255);
            $table->double("price");
            $table->tinyInteger("featured");
            $table->tinyInteger("state");
            $table->bigInteger("categories_id")->unique()->unsigned();
            $table->foreign("categories_id")->references("id")->on("categories")->onDelete("cascade");
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
