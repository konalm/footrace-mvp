<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RaceTimeService {
  /**
   *
   */
  public function get_race_time($id) {
      $race_times = DB::table('race_times')
          ->select('race_times.time', 'runners.id as runner_id',
            'runners.name as runner_name', 'races.id as race_id',
            'races.name as race_name', 'race_times.id as id'
          )
          ->join('races', 'race_times.race', '=', 'races.id')
          ->join('runners', 'race_times.runner', '=', 'runners.id')
          ->where('race_times.id', '=', $id)
          ->first();



      return $race_times;
  }
}
