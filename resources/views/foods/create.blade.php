@extends('app')
@section('content')
<h1 style="text-align: center">Create new</h1>
<hr>

<div class="row">

  <form class="col s12" role="form" method="POST" action="{{ url('foods') }}">
    @include ('errors.list')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include ('foods._form_create_edit')
  </form>
</div>
@stop