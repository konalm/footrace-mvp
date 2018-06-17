<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RaceTime;

class RaceTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $race_time = new RaceTime;
        $race_time->race = $request->race;
        $race_time->runner = $request->runner;
        $race_time->time = $request->time;
        $race_time->save();

        return response()->json('saved race time');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $race_time = RaceTime::find($id);
        $race_time->race = $request->race;
        $race_time->runner = $request->runner;
        $race_time->time = $request->time;
        $race_time->save();

        return response()->json([
          'message' => 'updated race time',
          'data' => $race_time
        ]);
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
