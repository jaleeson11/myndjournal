<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GratitudeJournalEntry;
use App\LifeGratitudes;
use App\DayRatings;

class GratitudeJournalController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function _contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns journal entries of user with 
     * day rating and life gratitude selections.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() { 

        $user_id = auth()->user()->id;
        $gratitude_journal_entries = GratitudeJournalEntry::with('dayRatings', 'lifeGratitudes')->where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(15);
        
        foreach($gratitude_journal_entries as $gratitude_journal_entry) {
            foreach($gratitude_journal_entry->dayRatings as $dayRating) {
                $dayRating->dr_image = 'data:image/jpeg;base64,' . base64_encode( $dayRating->dr_image);
            }
        }

        foreach($gratitude_journal_entries as $gratitude_journal_entry) {
            foreach($gratitude_journal_entry->lifeGratitudes as $lifeGratitude) {
                $lifeGratitude->lgr_image = 'data:image/jpeg;base64,' . base64_encode( $lifeGratitude->lgr_image);
            }
        }

        return view('gratitudejournal.index')->with('gratitude_journal_entries', $gratitude_journal_entries);
    }


    /**
     * Returns view for new journal entry.
     * 
     * @return \Illuminate\Http\Response
     */
    public function newEntry()
    {
        return view('gratitudejournal.new');
    }

    /**
     * Validates and stores details of new
     * journal entry.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'day_ratings' => 'required|array|between:1,3',
            'life_gratitudes' => 'required|array|between:1,3',
            'self_gratitudes' => 'required|array|between:1,5',    
        ]);

        $gj_entry = new GratitudeJournalEntry;
        $gj_entry->user_id = auth()->user()->id;
        $gj_entry['entry_date'] = date('Y-m-d H:i');
        $gj_entry->self_gratitudes = $request->has('self_gratitudes') ? $request->get('self_gratitudes') : [];
        $life_gratitudes = $request->has('life_gratitudes') ? $request->get('life_gratitudes') : [];
        $day_ratings = $request->has('day_ratings') ? $request->get('day_ratings') : [];  
        $gj_entry->save();
        
        $gj_entry->lifeGratitudes()->sync($life_gratitudes);
        $gj_entry->dayRatings()->sync($day_ratings);

        return redirect('/dashboard')->with('success', 'You submitted a new journal entry');
    }

    /**
     * Returns view to edit journal entry with details
     * of selected entry.
     */
    public function editEntry($id) {

        $gj_entry = GratitudeJournalEntry::find($id);

        if (auth()->user()->id !== $gj_entry->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorised Access');
        }

        return view('gratitudejournal.edit')->with('gj_entry', $gj_entry);
    }

    /**
     * Returns details of selected journal entry.
     */
    public function getEntry($id) {

        $gj_entry = GratitudeJournalEntry::find($id);

        if (auth()->user()->id !== $gj_entry->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorised Access');
        }

        return $gj_entry;
    }

    /**
     * Updates details of edited journal entry.
     */
    public function updateEntry(Request $request, $id) {

        $gj_entry = GratitudeJournalEntry::find($id);

        $gj_entry['entry_date'] = date('Y-m-d H:i');
        $gj_entry->self_gratitudes = $request->has('self_gratitudes') ? $request->get('self_gratitudes') : [];
        $life_gratitudes = $request->has('life_gratitudes') ? $request->get('life_gratitudes') : [];
        $day_ratings = $request->has('day_ratings') ? $request->get('day_ratings') : [];  
        $gj_entry->save();
        
        $gj_entry->lifeGratitudes()->sync($life_gratitudes);
        $gj_entry->dayRatings()->sync($day_ratings);

        return redirect('/gratitudejournal')->with('update', 'You updated your journal entry');
    }

    /**
     * Deletes selected journal entry.
     */
    public function destroyEntry($id) {

        $gj_entry = GratitudeJournalEntry::find($id);

        if (auth()->user()->id !== $gj_entry->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorised Access');
        }

        $gj_entry->delete();
        return redirect('/gratitudejournal')->with('destroy', 'You deleted your journal entry');
    }

    /**
     * Returns day ratings with converted images.
     */
    public function getDayRatings() {    
       
        $day_ratings = DayRatings::all();

        foreach($day_ratings as $day_rating) {
            $day_rating->dr_image = 'data:image/jpeg;base64,' . base64_encode( $day_rating->dr_image);
        }
        
        return $day_ratings;
    }

    /**
     * Returns life gratitudes with converted images.
     */
    public function getLifeGratitudes() {    
       
        $life_gratitudes = LifeGratitudes::all();

        foreach($life_gratitudes as $life_gratitude) {
            $life_gratitude->lgr_image = 'data:image/jpeg;base64,' . base64_encode( $life_gratitude->lgr_image);
        }
        
        return $life_gratitudes;
    }

}
