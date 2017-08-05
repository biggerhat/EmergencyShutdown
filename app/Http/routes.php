<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

Route::resource('articles', 'ArticlesController');
Route::resource('roles','RolesController');
Route::resource('tools','ToolsController');

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

Route::get('admin', 'AdminController@getIndex');
Route::get('admin/users/edit/{id}', 'AdminController@editUser');
Route::patch('admin/users/edit/{id}', 'AdminController@updateUser');
Route::get('admin/users', 'AdminController@getUsers');
Route::post('admin/role', 'AdminController@storeRole');
Route::get('admin/role','AdminController@createRole');

Route::get('hof', 'HofController@getIndex');
Route::get('hof/nominees', 'HofController@getNominees');
Route::get('hof/members', 'HofController@getMembers');
Route::get('hof/vote', 'HofController@getVote');
Route::post('hof/vote', 'HofController@submitVote');
Route::get('hof/admin','HofController@getAdmin');
Route::get('hof/pub_results', 'HofController@getPublicResults');
Route::get('hof/edit_ballot/{id}', 'HofController@editBallot');
Route::get('hof/edit_ballot_list', 'HofController@getBallotList');
Route::patch('hof/update_ballot/{id}', 'HofController@updateBallot');
Route::get('hof/edit_nominee/{id}', 'HofController@editNominee');
Route::get('hof/edit_nominee_list', 'HofController@getNomineeList');
Route::patch('hof/update_nominee/{id}', 'HofController@updateNominee');
Route::post('hof/create_committee_key', 'HofController@createCommitteeKey');
Route::get('hof/create_committee_key', 'HofController@getCreateCommitteeKey');
Route::get('hof/comm_list', 'HofController@getCommitteeList');
Route::post('hof/create_ballot', 'HofController@storeBallot');
Route::get('hof/create_ballot', 'HofController@createBallot');
Route::post('hof/create_nominee', 'HofController@storeNominee');
Route::get('hof/create_nominee', 'HofController@createNominee');
Route::get('hof/profile/{id}', 'HofController@getProfile');
Route::post('hof/comm_vote', 'HofController@submitCommVote');
Route::get('hof/comm_vote','HofController@getCommVote');
Route::get('hof/comm_results','HofController@getCommResults');

Route::get('api/deckname','ApiController@getDeckname');

Route::get('twitch', function() {
    $json_a = array();
    $string = file_get_contents("https://api.twitch.tv/kraken/streams?game=Android%3A%20Netrunner&client_id=utm11rwc9seas2oi0zi8aks3i9ilqu");
    $json_a = json_decode($string, true);
    dd($json_a);
});

Route::get('test', function() {
    return Request::ip();
});
