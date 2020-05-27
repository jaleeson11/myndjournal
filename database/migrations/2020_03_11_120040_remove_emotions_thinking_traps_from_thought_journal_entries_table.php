<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEmotionsThinkingTrapsFromThoughtJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thought_journal_entries', function (Blueprint $table) {
            $table->dropColumn('em_id');
            $table->dropColumn('tt_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thought_journal_entries', function (Blueprint $table) {
            $table->json('em_id')->nullable();
            $table->json('tt_id')->nullable();
        });
    }
}
