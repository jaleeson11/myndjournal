<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThinkingTraps extends Model
{
    protected $table = 'thinking_traps';
    public $primarykey = 'id';

    /**
     * Creates many to many relationship between thought journal
     * entries and thinking traps.
     */
    public function thoughtJournalEntries() {
        return $this->belongsToMany(ThoughtJournalEntry::class, 'thought_journal_entry_thinking_traps',
        'tt_id', 'tj_entry_id');
    }
}
