<?php

use Illuminate\Support\Facades\Auth;
use App\Race;
use App\Runner;
use App\RaceTime;
use Illuminate\Http\Request;
use App\Services\RunnerService;
use App\Services\RaceTimeService;



/**
 * Display all races in admin
 */
Route::get('/admin/races', function () {
  $races = Race::all();

  return view('admin.racesv2', [
    'races' => $races
  ]);
})->middleware('auth');


/**
 * Display a specific race
 */
Route::get('/admin/races/{race_id}', function (Request $request, $race_id) {
    $race = Race::find($race_id);
    $runner_service = new RunnerService();
    $runners = $runner_service->get_runner_race_times($race_id);

    return view('admin.racev2', [
        'race' => $race,
        'runners' => $runners
    ]);
})->middleware('auth');


/**
 * Add a New Race
 */
Route::post('/race', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'name' => 'required|min:0',
  ]);

  if ($validator->fails()) {
    return redirect('/admin/races')
      ->withInput()
      ->withErrors($validator);
  }

  $race = new Race;
  $race->name = $request->name;
  $race->save();

  return redirect('/admin/races');
})->middleware('auth');


/**
 * delete race
 */
Route::delete('/races/{id}', function ($id) {
  Race::findOrFail($id)->delete();

  return redirect('/admin/races');
})->middleware('auth');
