<?php

use App\Race;
use App\Runner;
use App\RaceTime;
use Illuminate\Http\Request;
use App\Services\RunnerService;
use App\Services\RaceTimeService;


/**
 * add race time
 */
Route::get('/races/{race_id}/runner/{runner_id}/add',
  function (Request $request, $race_id, $runner_id)
{
    $race = Race::findOrFail($race_id);
    $runner = Runner::findOrFail($runner_id);

    return view('admin.racetime.add-racetime', [
       'race' => $race,
       'runner' => $runner
    ]);
})->middleware('auth');

/**
 * Get specific race time to edit
 */
Route::get('/races/{race_id}/runner/{runner_id}/race_time/{race_time_id}',
  function (Request $request, $race_id, $runner_id, $race_time_id)
{
  $race_time_service = new RaceTimeService;
  $race_time = $race_time_service->get_race_time($race_time_id);

  return view('admin.racetime.update-racetime', [
    'race_time' => $race_time
  ]);
})->middleware('auth');



/**
 * Add a new Race Time
 */
Route::post('/race/{race_id}/runner/{runner_id}',
  function (Request $request, $race_id, $runner_id)
{
    $validator = Validator::make($request->all(), [
        'time' => 'required|numeric|min:1'
    ]);

    if ($validator->fails()) {
        return redirect('/races/' . $race_id . '/runner/' . $runner_id . '/add')
          ->withInput()
          ->withErrors($validator);
    }

    $race_time = new RaceTime;
    $race_time->race = $request->race;
    $race_time->runner = $request->runner;
    $race_time->time = $request->time;
    $race_time->save();

    return redirect ('/admin/races/' . $race_id);
})->middleware('auth');


/**
 * Update an existing Race Time
 */
Route::put('/race/{race_id}/runner/{runner_id}/race_time/{race_time_id}',
  function (Request $request, $race_id, $runner_id, $race_time_id)
{
    $validator = Validator::make($request->all(), [
        'time' => 'required|numeric|min:1'
    ]);

    if ($validator->fails()) {
        return redirect(
          '/races/' . $race_id . '/runner/' . $runner_id
          . '/race_time/' . $race_time_id
        )
          ->withInput()
          ->withErrors($validator);
    }

    $race_time = RaceTime::findOrFail($race_time_id);
    $race_time->time = $request->time;
    $race_time->save();

    return redirect ('/admin/races/' . $race_id);
})->middleware('auth');
