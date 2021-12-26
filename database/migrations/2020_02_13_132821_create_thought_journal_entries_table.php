<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThoughtJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thought_journal_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('entry_date');
            $table->mediumText('situation');
            $table->mediumText('thought');
            $table->mediumText('balanced_thought');
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
        Schema::dropIfExists('thought_journal_entries');
    }
}
