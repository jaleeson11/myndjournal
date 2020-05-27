<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThoughtJournalEntryEmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thought_journal_entry_emotions', function (Blueprint $table) {
            $table->integer('tj_entry_id')->unsigned();
            $table->integer('em_id')->unsigned();

            $table->foreign('tj_entry_id')
            ->references('id')
            ->on('thought_journal_entries')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('em_id')
            ->references('id')
            ->on('emotions')
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
        Schema::dropIfExists('thought_journal_entry_emotions');
    }
}
