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

 Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

Route::get('twitch', function() {
    $json_a = array();
    $string = file_get_contents("https://api.twitch.tv/kraken/streams?game=Android%3A%20Netrunner&client_id=utm11rwc9seas2oi0zi8aks3i9ilqu");
    $json_a = json_decode($string, true);
    dd($json_a);
});
Route::get('test', ['middleware' => 'admin', function() {
    return 'this page may only be viewed by admins.';
}]);
//Route::auth();
