<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnrCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onr_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('type');
            $table->string('side');
            $table->string('keywords');
            $table->string('set');
            $table->string('rarity');
            $table->text('text');
            $table->string('artist');
            $table->string('cost');
            $table->string('memory');
            $table->string('diff');
            $table->string('agenda');
            $table->string('strength');
            $table->string('trash');
            $table->string('image');
            $table->text('rulings');
            $table->text('errata');
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
        Schema::drop('onr_cards');
    }
}
