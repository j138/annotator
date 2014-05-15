<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// ファイルロードしてjpgを選別し、ファイルサイズとか
	return View::make('annotate');
	// return View::make('annotate')->with('any', $any);
});

Route::get('get_img', function()
{
	return json_encode();
});
