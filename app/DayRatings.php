<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayRatings extends Model
{
    protected $table = 'day_ratings';
    public $primarykey = 'id';

    /**
     * Creates many to many relationship between gratitude journal
     * entries and day ratings.
     */
    public function gratitudeJournalEntries() {
        return $this->belongsToMany(GratitudeJournalEntry::class, 'gratitude_journal_entry_day_ratings',
        'dr_id', 'gj_entry_id');
    }
}
