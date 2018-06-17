<?php

use App\Race;
use App\Runner;
use App\RaceTime;
use Illuminate\Http\Request;
use App\Services\RunnerService;
use App\Services\RaceTimeService;


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

Auth::routes();


/**
 * Get races and race times of race if race selected
 */
Route::get('/', function (Request $request) {
  $races = Race::all();
  $runner_times = [];
  $race_id = $request->query('race-times');

  if ($race_id) {
    $runner_service = new RunnerService();
    $runner_times = $runner_service->get_runner_race_times($race_id);
  }

  return view('racesv2', [
    'races' => $races,
    'active_race' => $race_id,
    'runners_times' => $runner_times
  ]);
});


require('race.php');
require('race-time.php');
