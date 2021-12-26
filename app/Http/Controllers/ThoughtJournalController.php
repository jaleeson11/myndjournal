<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\ThoughtJournalEntry;
use App\Emotions;
use App\ThinkingTraps;

class ThoughtJournalController extends Controller
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
	 * emotion and thinking trap selections.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function index() { 

		$user_id = auth()->user()->id;
		$thought_journal_entries = ThoughtJournalEntry::with('emotions', 'thinkingTraps')->where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(15);
		
		foreach($thought_journal_entries as $thought_journal_entry) {
			foreach($thought_journal_entry->emotions as $emotion) {
				$emotion->em_image = 'data:image/jpeg;base64,' . base64_encode( $emotion->em_image);
			}
		}

		foreach($thought_journal_entries as $thought_journal_entry) {
			foreach($thought_journal_entry->thinkingTraps as $thinkingTrap) {
				$thinkingTrap->tt_image = 'data:image/jpeg;base64,' . base64_encode( $thinkingTrap->tt_image);
			}
		}

		return view('thoughtjournal.index')->with('thought_journal_entries', $thought_journal_entries);
	}


	/**
	 * Returns view for new journal entry.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function newEntry()
	{
		return view('thoughtjournal.new');
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
			'situation_entry' => 'required',
			'emotions' => 'required|array|between:1,3',
			'thinking_traps' => 'required|array|between:1,3', 
			'balanced_thought' => 'required',          
		]);

		$tj_entry = new ThoughtJournalEntry;
		$tj_entry->user_id = auth()->user()->id;
		$tj_entry['entry_date'] = date('Y-m-d H:i');
		$tj_entry->situation = $request->input('situation_entry');
		$emotions = $request->has('emotions') ? $request->get('emotions') : [];
		$tj_entry->thoughts = $request->has('thoughts') ? $request->get('thoughts') : [];
		$thinkingTraps = $request->has('thinking_traps') ? $request->get('thinking_traps') : [];
		$tj_entry->balanced_thought = $request->input('balanced_thought');
		$tj_entry->save();

		$tj_entry->emotions()->sync($emotions);
		$tj_entry->thinkingTraps()->sync($thinkingTraps);

		return redirect('/dashboard')->with('success', 'You submitted a new journal entry');
	}

	/**
	 * Returns view to edit journal entry with details
	 * of selected entry.
	 */
	public function editEntry($id) {

		$tj_entry = ThoughtJournalEntry::find($id);

		if (auth()->user()->id !== $tj_entry->user_id) {
			return redirect('/dashboard')->with('error', 'Unauthorised Access');
		}

		return view('thoughtjournal.edit')->with('tj_entry', $tj_entry);
	}

	/**
	 * Returns details of selected journal entry.
	 */
	public function getEntry($id) {

		$tj_entry = ThoughtJournalEntry::find($id);

		if (auth()->user()->id !== $tj_entry->user_id) {
			return redirect('/dashboard')->with('error', 'Unauthorised Access');
		}

		return $tj_entry;
	}

	/**
	 * Updates details of edited journal entry.
	 */
	public function updateEntry(Request $request, $id) {

		$tj_entry = ThoughtJournalEntry::find($id);

		$tj_entry['entry_date'] = date('Y-m-d H:i');
		$tj_entry->situation = $request->input('situation_entry');
		$emotions = $request->has('emotions') ? $request->get('emotions') : [];
		$tj_entry->thoughts = $request->has('thoughts') ? $request->get('thoughts') : [];
		$thinkingTraps = $request->has('thinking_traps') ? $request->get('thinking_traps') : [];
		$tj_entry->balanced_thought = $request->input('balanced_thought');
		$tj_entry->save();

		$tj_entry->emotions()->sync($emotions);
		$tj_entry->thinkingTraps()->sync($thinkingTraps);

		return redirect('/thoughtjournal')->with('update', 'You updated your journal entry');
	}

	/**
	 * Deletes selected journal entry.
	 */
	public function destroyEntry($id) {

		$tj_entry = ThoughtJournalEntry::find($id);

		if (auth()->user()->id !== $tj_entry->user_id) {
			return redirect('/dashboard')->with('error', 'Unauthorised Access');
		}

		$tj_entry->delete();
		return redirect('/thoughtjournal')->with('destroy', 'You deleted your journal entry');
	}

	/**
	 * Returns emotions with converted images.
	 */
	public function getEmotions() {    
	   
		$emotionsList = Emotions::all();

		foreach($emotionsList as $emotion) {
			$emotion->em_image = 'data:image/jpeg;base64,' . base64_encode( $emotion->em_image);
		}
		
		return $emotionsList;
	}

	/**
	 * Returns thiking traps with converted images.
	 */
	public function getThinkingTraps() {

		$thinkingTrapsList = ThinkingTraps::all();

		foreach($thinkingTrapsList as $thinkingTrap) {
			$thinkingTrap->tt_image = 'data:image/jpeg;base64,' . base64_encode( $thinkingTrap->tt_image);
		}
		
		return $thinkingTrapsList;
	}
}
