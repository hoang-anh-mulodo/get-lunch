@extends('app')
@section('content')
<h1 style="text-align: center">Edit exist things</h1>
<hr>

<div class="row">

  <form class="col s12" role="form" method="POST" action="{{ url('foods/'.$food->id.'/update') }}">
    @include ('errors.list')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include ('foods._form_create_edit',['food' => $food])
  </form>
</div>
@stop