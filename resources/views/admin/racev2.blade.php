@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $race['name'] }}</h1>

    <a href="/admin/races">
      <button class="btn btn-secondary mt-3"> Go Back </button>
    </a>

    @if (count($runners) > 0)
      <div class="card mt-5">
          <div class="card-header"> Runner Times </div>

          @foreach ($runners as $runner)
            <div class="list-group-item">
              <p class="lead">{{ $runner->name }}</p>
              <p> Time: {{ $runner->time ? $runner->time : 'not specified' }} </p>

              @if($runner->time)
              <a href="/races/{{$race['id']}}/runner/{{$runner->id}}/race_time/{{$runner->race_time_id}}"
                class="card-link"
              >
                 Edit
              </a>

              @else
              <a href="/races/{{$race['id']}}/runner/{{$runner->id}}/add"
                 class="card-link"
              >
                Add
              </a>
              @endif
            </div>
          @endforeach
      </div>
    @endif
  </div>
@endsection
