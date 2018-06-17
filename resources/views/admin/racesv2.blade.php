@extends('layouts.app')

@section('content')
  <div class="container">
    <!-- New Race Form -->
      <form action="/race" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <!-- Race Name -->
          <div class="form-group">
              <label for="race" class="col-sm-3 control-label">Race</label>

              <div class="col-sm-6">
                  <input type="text" name="name" id="raceName"
                    class="form-control"
                  >
              </div>
          </div>

          <!-- Add Race Button -->
          <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-default">
                      <i class="fa fa-plus"></i> Add Race
                  </button>
              </div>
          </div>

          <div class="form-group">
            <!-- Display Validation Errors -->
            @include('common.errors')
          </div>
      </form>

    <!-- all current races -->
    @if (count($races) > 0)
      <div class="card mt-5">
        <div class="card-header">Current Races</div>

        <div class="list-group list-group-flush">
          @foreach ($races as $race)
            <div class="list-group-item">
              {{ $race->name }}


              <form action="/races/{{ $race->id }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">


                <button class="btn-danger mt-3"> Delete Race</button>
              </form>

              <a href="/admin/races/{{$race->id}}" class="mt-1">
                <button class="mt-3 btn-secondary"> Race Times </button>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </div>
@endsection
