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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reservations_id');
            $table->foreign('reservations_id')->references('id')->on('reservations')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('formextra_id');
            $table->foreign('formextra_id')->references('id')->on('form_extras')->onUpdate('cascade')->onDelete('cascade');

            $table->string('textbox')->nullable();

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
        Schema::dropIfExists('fields');
    }
};
