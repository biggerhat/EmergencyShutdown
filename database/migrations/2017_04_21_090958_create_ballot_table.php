<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBallotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('closed')->default('0');
            $table->timestamps();
        });

        Schema::create('ballot_nominee', function (Blueprint $table) {
            $table->integer('ballot_id')->unsigned()->index();
            $table->foreign('ballot_id')->references('id')->on('ballots')->onDelete('cascade');
            $table->integer('nominee_id')->unsigned()->index();
            $table->foreign('nominee_id')->references('id')->on('nominees')->onDelete('cascade');
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
        Schema::drop('ballot_nominee');
        Schema::drop('ballots');
    }
}
