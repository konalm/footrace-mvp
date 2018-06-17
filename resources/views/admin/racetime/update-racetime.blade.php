@extends('layouts.app')

@section('content')
<div class="container">
<h1> Update Race Time </h1>

<p class="lead"> Race: {{ $race_time->race_name }} </p>
<p class="lead"> Runner: {{ $race_time->runner_name }} </p>

<form action="/race/{{$race_time->race_id}}/runner/{{$race_time->runner_id}}/race_time/{{$race_time->id}}"
    method="POST"
    class="form-horizontal"
>
  {{ csrf_field() }}

  <input name="_method" type="hidden" value="PUT">
  <input type="hidden" name="race" value={{ $race_time->race_id}}>
  <input type="hidden" name="runner" value={{ $race_time->runner_id }}>

  <div class="form-group mt-2">
    Track Time:
    <input type="number" name="time" placeholder="update track time"
      class="ml-2"
      value={{$race_time->time}}
    >

    <button type="submit" class="btn-primary ml-3">
        <i class="fa fa-plus"></i> Update
    </button>
  </div>

  <div class="form-group">
      @include('common.errors')
  </div>
</form>
</div>
@endsection
