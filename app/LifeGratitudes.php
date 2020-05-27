<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LifeGratitudes extends Model
{
    protected $table = 'life_gratitudes';
    public $primarykey = 'id';

    /**
     * Creates many to many relationship between gratitude journal
     * entries and life gratitudes.
     */
    public function gratitudeJournalEntries() {
        return $this->belongsToMany(GratitudeJournalEntry::class, 'gratitude_journal_entry_life_gratitudes',
        'lgr_id', 'gj_entry_id');
    }
}
