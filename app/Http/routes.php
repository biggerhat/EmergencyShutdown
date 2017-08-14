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

Route::get('deckname','ToolsController@getDeckname');

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

//Misc Admin Functions
Route::get('admin', 'AdminController@getIndex');
Route::get('admin/users/edit/{id}', 'AdminController@editUser');
Route::patch('admin/users/edit/{id}', 'AdminController@updateUser');
Route::get('admin/users', 'AdminController@getUsers');
Route::post('admin/role', 'AdminController@storeRole');
Route::get('admin/role','AdminController@createRole');
//End Admin


//Hall of Fame Content
Route::get('hof', 'HofController@getIndex');
Route::get('hof/about', 'HofController@getAbout');
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
Route::get('hof/edit_news_list', 'HofController@getNewsList');
Route::post('hof/create_news', 'HofController@storeNews');
Route::get('hof/create_news','HofController@createNews');
Route::get('hof/edit_news/{id}', 'HofController@editNews');
Route::patch('hof/update_news/{id}', 'HofController@updateNews');
Route::post('hof/create_ballot', 'HofController@storeBallot');
Route::get('hof/create_ballot', 'HofController@createBallot');
Route::post('hof/create_nominee', 'HofController@storeNominee');
Route::get('hof/create_nominee', 'HofController@createNominee');
Route::get('hof/profile/{id}', 'HofController@getProfile');
Route::post('hof/comm_vote', 'HofController@submitCommVote');
Route::get('hof/comm_vote','HofController@getCommVote');
Route::get('hof/comm_results','HofController@getCommResults');
//End Hall of Fame

//ONR Content
Route::get('webminster/sets/{set}','ONRController@getSet');
Route::get('webminster/sets','ONRController@getSets');
Route::get('webminster/cards/{id}', 'ONRController@getCard');
Route::post('webminster/quicksearch', 'ONRController@quicksearchCard');
Route::post('webminster/search', 'ONRController@searchCard');
Route::get('webminster/search', 'ONRController@getSearch');
Route::get('webminster', 'ONRController@getIndex');
Route::get('onr/create_card','ONRController@createCard');
Route::post('onr/create_card','ONRController@storeCard');
Route::get('onr/edit_card/{id}','ONRController@editCard');
Route::patch('onr/update_card/{id}','ONRController@updateCard');
//End ONR

Route::get('api/deckname','ApiController@getDeckname');

Route::get('streams', 'PagesController@getStreams');

Route::get('decklists', function() {
    $string = file_get_contents("https://alwaysberunning.net/api/tournaments?approved=1&concluded=1&recur=0");
    $json_a = json_decode($string, true);
    dd($json_a);
});

Route::get('nrdb', function() {
    $string = file_get_contents("https://netrunnerdb.com/api/2.0/public/cards");
    $json_a = json_decode($string, true);
    dd($json_a);
});