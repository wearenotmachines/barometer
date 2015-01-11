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

Route::get('/', "Barometer\Controllers\OverviewController@overview");

Route::post("/login", "Barometer\Controllers\AccessController@loginUser");
Route::any("/logout", "Barometer\Controllers\AccessController@logoutUser");

/**
 * Status Routes
 */
Route::get("/status", "Barometer\Controllers\StatusesController@getReportInFragment");

/**
 * Scheme Routes
 */
Route::get("/scheme/{id}", "Barometer\Controllers\SchemesController@view");