<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for hadling data that is being passed to the 
    | dashboard - primarily the number of journal entries for each user.
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns the application dashboard with the number
     * of journal entries of the user.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $tj_entries_num = \DB::table('thought_journal_entries')->where('user_id', $user_id)->count();
        $gj_entries_num = \DB::table('gratitude_journal_entries')->where('user_id', $user_id)->count();
        
        return view('pages.dashboard')->with('tj_entries_num', $tj_entries_num)->with('gj_entries_num', $gj_entries_num);
    }
}
