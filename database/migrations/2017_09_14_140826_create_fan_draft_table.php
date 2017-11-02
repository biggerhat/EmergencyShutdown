<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFanDraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fan_drafts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->text('scoring');
            $table->integer('creds');
            $table->integer('all_creds');
            $table->integer('team_lim');
            $table->integer('all_team');
            $table->integer('elite');
            $table->integer('writeins');
            $table->integer('writein_value');
            $table->integer('open')->default('1');
            $table->integer('complete')->default('0');
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
        Schema::drop('fan_drafts');
    }
}
