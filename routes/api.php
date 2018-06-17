<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/db-test', function () {

  // Test database connection
  try {
      DB::connection()->getPdo();
  } catch (\Exception $e) {
      return $e;
      die("Could not connect to the database.  Please check your configuration.");
  }

  return 'database connection successful';
});



Route::resource('races', 'RaceController');
Route::resource('runners', 'RunnerController');
Route::resource('race_times', 'RaceTimeController');

Route::get('runner-track-times/{track_id}', 'RunnerController@getRaceTimes');
