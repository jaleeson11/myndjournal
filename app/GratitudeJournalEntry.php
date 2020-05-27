<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GratitudeJournalEntry extends Model
{
    protected $table = 'gratitude_journal_entries';
    public $primarykey = 'id';
    public $timestamps = true;
    public $casts = ['self_gratitudes'=> 'array'];
    public $fillable = ['self_gratitudes'];

    /**
     * Creates one to many relationship between gratitude journal
     * entry and users.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Creates many to many relationship between gratitude journal
     * entries and day ratings.
     */
    public function dayRatings() {
        return $this->belongsToMany(DayRatings::class, 'gratitude_journal_entry_day_ratings',
        'gj_entry_id', 'dr_id');
    }

    /**
     * Creates many to many relationship between gratitude journal
     * entries and life gratitudes.
     */
    public function lifeGratitudes() {
        return $this->belongsToMany(LifeGratitudes::class, 'gratitude_journal_entry_life_gratitudes',
        'gj_entry_id', 'lgr_id');
    }
}
