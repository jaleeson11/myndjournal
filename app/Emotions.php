<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotions extends Model
{
    protected $table = 'emotions';
    public $primarykey = 'id';

    /**
     * Creates many to many relationship between thought journal
     * entry and emotions.
     */
    public function thoughtJournalEntries() {
        return $this->belongsToMany(ThoughtJournalEntry::class, 'thought_journal_entry_emotions',
        'em_id', 'tj_entry_id');
    }

}
