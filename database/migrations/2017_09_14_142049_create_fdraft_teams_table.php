<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFdraftTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdraft_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('fan_draft_id');
            $table->string('name');
            $table->integer('elite')->default('0');
            $table->integer('cost');
            $table->integer('score')->default('0');
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
        Schema::drop('fdraft_teams');
    }
}
