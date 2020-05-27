<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThoughtJournalEntry extends Model
{
    protected $table = 'thought_journal_entries';
    public $primarykey = 'id';
    public $timestamps = true;
    public $casts = ['thoughts'=> 'array'];
    public $fillable = ['thoughts'];

    /**
     * Creates one to many relationship between thought journal
     * entry and users.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Creates many to many relationship between thought journal
     * entries and life emotions.
     */
    public function emotions() {
        return $this->belongsToMany(Emotions::class, 'thought_journal_entry_emotions',
        'tj_entry_id', 'em_id');
    }

    /**
     * Creates many to many relationship between thought journal
     * entries and thinking traps.
     */
    public function thinkingTraps() {
        return $this->belongsToMany(ThinkingTraps::class, 'thought_journal_entry_thinking_traps',
        'tj_entry_id', 'tt_id');
    }

}
