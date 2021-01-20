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
            $table->bigIncrements('id');
            $table->foreignId('liga_id');
            $table->string('name');
            $table->integer('price')->default(125000);
            $table->integer('namesetPrice')->default(50000);
            $table->boolean('is_ready')->default(true);
            $table->string('type')->default('Replika Top Quality');
            $table->float('weight')->default(0.25);
            $table->string('image');
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
