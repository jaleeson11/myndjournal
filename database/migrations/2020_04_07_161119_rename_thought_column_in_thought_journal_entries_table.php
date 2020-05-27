<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameThoughtColumnInThoughtJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thought_journal_entries', function (Blueprint $table) {
            $table->renameColumn('thought', 'thoughts');
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
            $table->renameColumn('thoughts', 'thought');
        });
    }
}
