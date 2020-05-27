<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGratitudeJournalEntryLifeGratitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gratitude_journal_entry_life_gratitudes', function (Blueprint $table) {
            $table->integer('gj_entry_id')->unsigned();
            $table->integer('lgr_id')->unsigned();

            $table->foreign('gj_entry_id')
            ->references('id')
            ->on('gratitude_journal_entries')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('lgr_id')
            ->references('id')
            ->on('life_gratitudes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gratitude_journal_entry_life_gratitudes');
    }
}
