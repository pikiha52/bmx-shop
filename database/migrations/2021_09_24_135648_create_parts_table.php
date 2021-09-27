<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->string('id');
            $table->string('category_id');
            $table->string('brand_id');
            $table->string('merk');
            $table->string('slug');
            $table->string('image');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('qty');
            $table->unsignedBigInteger('weight');
            $table->longText('details');
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
        Schema::dropIfExists('parts');
    }
}
