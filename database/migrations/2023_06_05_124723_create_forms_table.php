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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();

            $table->integer('limit');
            $table->integer('range');
            $table->boolean('phone_number');
            $table->boolean('dob');
            $table->integer('interval');
            $table->time('open');
            $table->time('close');
            $table->integer('dp_amt');
            $table->integer('tax_amt');

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
        Schema::dropIfExists('forms');
    }
};
