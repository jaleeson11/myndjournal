<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThoughtJournalEntryThinkingTrapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thought_journal_entry_thinking_traps', function (Blueprint $table) {
            $table->integer('tj_entry_id')->unsigned();
            $table->integer('tt_id')->unsigned();

            $table->foreign('tj_entry_id')
            ->references('id')
            ->on('thought_journal_entries')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('tt_id')
            ->references('id')
            ->on('thinking_traps')
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
        Schema::dropIfExists('thought_journal_entry_thinking_traps');
    }
}
