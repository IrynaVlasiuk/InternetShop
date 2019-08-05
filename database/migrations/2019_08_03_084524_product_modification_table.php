<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductModificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_modification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_article');
            $table->unsignedBigInteger('modification_id');
            $table->string('value');
        });

        Schema::table('product_modification', function (Blueprint $table) {
           $table->foreign('product_article')->references('article')->on('products')->onDelete('cascade');
           $table->foreign('modification_id')->references('id')->on('modifications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
