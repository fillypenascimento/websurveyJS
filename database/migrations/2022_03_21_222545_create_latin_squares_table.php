<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatinSquaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latin_squares', function (Blueprint $table) {
            // $table->charset = 'utf8';
            // $table->collation = 'utf8_general_ci';
            $table->increments('id');
            $table->string('first_square')->nullable();
            $table->string('second_square')->nullable();
            $table->string('third_square')->nullable();
            $table->string('fourth_square')->nullable();
            $table->integer('first_row_subject_id')->unsigned()->nullable();
            $table->foreign('first_row_subject_id')->references('id')->on('subjects');
            $table->integer('second_row_subject_id')->unsigned()->nullable();
            $table->foreign('second_row_subject_id')->references('id')->on('subjects');
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
        // Schema::dropIfExists('latin_squares');
        Schema::dropIfExists('latin_squares', function (Blueprint $table) {
            $table->dropForeign(['first_row_subject_id']);
            $table->dropForeign(['second_row_subject_id']);
        });
    }
}
