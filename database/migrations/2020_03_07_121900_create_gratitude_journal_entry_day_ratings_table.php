<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGratitudeJournalEntryDayRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gratitude_journal_entry_day_ratings', function (Blueprint $table) {
            $table->integer('gj_entry_id')->unsigned();
            $table->integer('dr_id')->unsigned();

            $table->foreign('gj_entry_id')
            ->references('id')
            ->on('gratitude_journal_entries')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('dr_id')
            ->references('id')
            ->on('day_ratings')
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
        Schema::dropIfExists('gratitude_journal_entry_day_ratings');
    }
}
