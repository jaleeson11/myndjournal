<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

// Home Page
Route::get('/', function () {
    return view('pages.home');
});

// Authentication Routes 
Auth::routes();

// Privacy Policy
Route::get('/privacy-policy', function() {
    return view('pages.privacypolicy');
})->name('privacypolicy');

// Terms of Use
Route::get('/terms-of-use', function() {
    return view('pages.terms');
})->name('terms');

// Control Panel Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Thought Journal 
Route::get('/thoughtjournal', 'ThoughtJournalController@index')->name('thoughtjournal');

// Gratitude Journal
Route::get('/gratitudejournal', 'GratitudeJournalController@index')->name('gratitudejournal');

// New Thought Journal Entry
Route::get('/thoughtjournal/newentry', 'ThoughtJournalController@newEntry')->name('thoughtjournalnew');

// Edit Thought Journal Entry
Route::put('/thoughtjournal/{id}/edit', 'ThoughtJournalController@editEntry')->name('thoughtjournaledit');

// Delete Thought Journal Entry
Route::delete('/thoughtjournal/{id}/delete', 'ThoughtJournalController@destroyEntry');

// Update Thought Journal Entry
Route::post('/thoughtjournal/{id}/update', 'ThoughtJournalController@updateEntry');

// Thought Journal Entry Details
Route::get('/thoughtjournal/{id}/get', 'ThoughtJournalController@getEntry');

// Thought Journal Emotions 
Route::get('/thoughtjournal/emotions', 'ThoughtJournalController@getEmotions');

// Thought Journal Thinking Traps
Route::get('/thoughtjournal/thinkingtraps', 'ThoughtJournalController@getThinkingTraps');

// Submit Thought Journal Entry
Route::post('/thoughtjournal/submit', 'ThoughtJournalController@store');

// Submit Gratitude Journal Entry
Route::post('/gratitudejournal/submit', 'GratitudeJournalController@store');

// Gratitude Journal
Route::get('/gratitudejournal', 'GratitudeJournalController@index')->name('gratitudejournal');

// New Gratitude Journal Entry
Route::get('/gratitudejournal/newentry', 'GratitudeJournalController@newEntry')->name('gratitudejournalnew');

// Edit Gratitude Journal Entry
Route::put('/gratitudejournal/{id}/edit', 'GratitudeJournalController@editEntry')->name('gratitudejournaledit');

// Delete Gratitude Journal Entry
Route::delete('/gratitudejournal/{id}/delete', 'GratitudeJournalController@destroyEntry');

// Update Gratitude Journal Entry
Route::post('/gratitudejournal/{id}/update', 'GratitudeJournalController@updateEntry');

// Gratitude Journal Entry Details
Route::get('/gratitudejournal/{id}/get', 'GratitudeJournalController@getEntry');

// Gratitude Journal Day Ratings
Route::get('/gratitudejournal/dayratings', 'GratitudeJournalController@getDayRatings');

// Gratitude Journal Life Gratitudes
Route::get('/gratitudejournal/lifegratitudes', 'GratitudeJournalController@getLifeGratitudes');

// Submit Gratitude Journal Entry
Route::post('/gratitudejournal/submit', 'GratitudeJournalController@store');

// Edit User Account Details
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);

// Update User Account Details
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);









