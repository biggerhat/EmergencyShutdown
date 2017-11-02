<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFdraftPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdraft_players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('aka');
            $table->text('profile');
            $table->integer('cost');
            $table->integer('score');
            $table->integer('fan_draft_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('fdraft_player_fdraft_team', function (Blueprint $table) {
            $table->integer('fdraft_team_id')->unsigned()->index();
            $table->foreign('fdraft_team_id')->references('id')->on('fdraft_teams')->onDelete('cascade');
            $table->integer('fdraft_player_id')->unsigned()->index();
            $table->foreign('fdraft_player_id')->references('id')->on('fdraft_players')->onDelete('cascade');
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
        Schema::drop('fdraft_player_fdraft_team');
        Schema::drop('fdraft_players');
    }
}
