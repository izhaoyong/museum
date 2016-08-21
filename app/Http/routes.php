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

/*Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');*/

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
Route::pattern('category', '\D+');
Route::get('/', 'HomeController@index');

Route::get('book','BookController@index');
Route::get('book/{id}', 'BookController@show');

Route::get('couplet','CoupletController@index');
Route::get('couplet/{id}', 'CoupletController@show');

Route::get('chant/{category?}','ChantController@index');
Route::get('chants/{id}', 'ChantController@show');

Route::get('dict','DictController@index');
Route::get('dict/{id}', 'DictController@show');

Route::get('english','EnglishController@index');
Route::get('english/{id}', 'EnglishController@show');

Route::get('oldbeijing','OldbeijingController@index');
Route::get('oldbeijing/{id}', 'OldbeijingController@show');

Route::get('oral','OralController@index');
Route::get('orals/{id}', 'OralController@show'); 

Route::get('place','PlaceController@index');
Route::get('place/{id}', 'PlaceController@show');

Route::get('poem','PoemController@index');
Route::get('poem/{id}', 'PoemController@show');

Route::get('page/{id}', 'PagesController@show');



Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
  // Route::get('pages', 'AdminHomeController@index');
  Route::resource('page', 'PageController');
  Route::resource('book','BookController');
  Route::resource('chant','ChantController');
  Route::resource('chant_normal','Chant_normalController');
  Route::resource('chant_other', 'Chant_otherController');
  Route::resource('chant_teach', 'Chant_teachController');
  Route::resource('dict','DictController');
  Route::resource('english','EnglishController');
  Route::resource('oldbeijing','OldbeijingController');
  Route::resource('oral','OralController');
  Route::resource('place','PlaceController');
  Route::resource('poem','PoemController');
});

Route::post('comment/store', 'CommentsController@store');








