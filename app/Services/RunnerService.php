<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;


class RunnerService {
    /**
     *
     */
    public function get_runner_race_times($race_id) {
        $runners_times = DB::table('runners')
            ->select(['runners.id', 'runners.name', 'race_times.time',
                'race_times.id as race_time_id'])
            ->leftJoin('race_times', function ($join) use ($race_id) {
                $join->on('runners.id', '=', 'race_times.runner')
                    ->where('race_times.race', '=', $race_id);
            })
            ->get();

        return $runners_times;
    }
}
