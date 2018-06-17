@extends('layouts.app')

@section('content')
<div class="container">
<h1> Add Race Time </h1>
<p class="lead"> Race: {{ $race['name'] }} </p>
<p class="lead"> Runner: {{ $runner['name'] }} </p>

<form action="/race/{{$race['id']}}/runner/{{$runner['id']}}"
    method="POST"
    class="form-horizontal"
>
  {{ csrf_field() }}

  <input type="hidden" name="race" value={{ $race['id'] }}>
  <input type="hidden" name="runner" value={{ $runner['id'] }}>

  <div class="form-group mt-2">
    Track Time:
    <input type="number" name="time" placeholder="add track time"
      class="ml-2"
      value={{$runner->time}}
    >

    <button type="submit" class="btn-primary ml-3">
        <i class="fa fa-plus"></i> Add
    </button>
  </div>

  <div class="form-group">
      @include('common.errors')
  </div>
</form>
</div>
@endsection
