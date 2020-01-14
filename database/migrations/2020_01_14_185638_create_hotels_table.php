<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('rating');
            $table->enum('category', ['hotel', 'alternative', 'hostel', 'lodge', 'resort', 'guest-house']);
            $table->string('image');
            $table->integer('reputation');
            $table->enum('reputation_badge', ['red', 'yellow', 'green']);
            $table->integer('price');
            $table->integer('availability');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
