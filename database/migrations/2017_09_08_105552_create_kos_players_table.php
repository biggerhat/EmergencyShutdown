<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKosPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos_players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kos_team_id')->unsigned();
            $table->string('name');
            $table->string('aka');
            $table->string('pref_corp');
            $table->string('pref_runn');
            $table->string('free_agent')->default('');
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
        Schema::drop('kos_players');
    }
}
