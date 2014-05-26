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
});

// 画像の情報を保存するAPI
Route::controller('/annotate', 'annotateController');

