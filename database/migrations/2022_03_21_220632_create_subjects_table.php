<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            // $table->charset = 'utf8';
            // $table->collation = 'utf8_general_ci';
            $table->increments('id');
            $table->integer('age')->nullable();
            $table->string('degree')->nullable();
            $table->string('experience')->nullable();
            $table->string('email')->nullable();
            $table->string('ip')->nullable();
            $table->string('ref');
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
        Schema::dropIfExists('subjects');
    }
}
