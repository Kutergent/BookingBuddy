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
        Schema::create('form_extras', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('forms_id');
            $table->foreign('forms_id')->references('id')->on('forms')->onUpdate('cascade')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('textbox')->nullable();
            $table->boolean('enabled');

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
        Schema::dropIfExists('form_extras');
    }
};
