@extends('layouts.app')

@section('content')
  <div class="container">
    <p class="lead"> Races </p>

    @if (count($races) > 0)
      <div class="card mt-5">
        @foreach ($races as $race)
          <div class="card-header">
            {{ $race['name'] }}
            <a href="/?race-times={{$race['id']}}" class="card-link ml-4"> View Race Times </button> </a>
          </div>

          @if (intval($active_race) === $race['id'])
            <div class="card-body">
              <div class="list-group">
                @foreach ($runners_times as $time)
                  <div class="list-group-item">
                    <p class="lead">{{ $time->name }}<p>
                    <p>time: {{ $time->time ? $time->time : 'not recorded'}}</p>
                  </div>
                @endforeach
              </div>
            </div>
          @endif 
        @endforeach
      </div>
    @endif
  </div>
@endsection
