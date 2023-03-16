<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            // relation
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // end relation

            $table->string('title', 100);
            $table->text('description');
            $table->float('night_price', 8, 2);
            $table->tinyInteger('n_beds');
            $table->tinyInteger('n_rooms');
            $table->text('cover_img');
            $table->smallInteger('mq');
            $table->boolean('visible');
            $table->string('address', 200);
            $table->string('latitude', 50);
            $table->string('longitude', 50);
            
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
        Schema::dropIfExists('properties');
    }
};
