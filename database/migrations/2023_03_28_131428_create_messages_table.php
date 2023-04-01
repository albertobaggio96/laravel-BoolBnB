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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // relation
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onUpdate('cascade')->onDelete('cascade');
            // end relation

            $table->string('mail_from', 100);
            $table->string('name', 100);
            $table->string('subject', 100);
            $table->text('body_message');
            $table->boolean('displayed');
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
        Schema::dropIfExists('messages');
    }
};
