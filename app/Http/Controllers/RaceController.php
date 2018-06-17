<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Race;
use App\Runner;

class RaceController extends Controller
{
    /**
     * Display All races and race times for selected race
     */
    // public function index(Request $request)
    // {
    //   $races = Race::all();
    //   $runners_times = [];
    //
    //   $race_id = $request->query('race-times');
    //
    //   if ($race_id) {
    //   $runners_times = DB::table('runners')
    //       ->select(['runners.id', 'runners.name', 'race_times.time',
    //           'race_times.id as race_time_id'])
    //       ->leftJoin('race_times', function ($join) use ($race_id) {
    //           $join->on('runners.id', '=', 'race_times.runner')
    //               ->where('race_times.race', '=', $race_id);
    //       })
    //       ->get();
    //   }
    //
    //   return view('racesv2', [
    //     'races' => $races,
    //     'active_race' => $race_id,
    //     'runners_times' => $runners_times
    //   ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $race = new Race;
        $race->name = $request->name;
        $race->location = $request->location;
        $race->distance = $request->distance;
        $race->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $race = Race::findOrFail($id);

      return response()->json($race);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
