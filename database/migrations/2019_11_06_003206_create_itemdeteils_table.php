<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemdeteilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemdeteils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->string('title');
            $table->string('description');
            $table->float('price');
            $table->integer('language');
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
        Schema::dropIfExists('itemdeteils');
    }
}
