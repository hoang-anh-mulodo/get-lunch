@extends('app')
@section('content')
@if (session()->has('message'))
<ul class="collection">
  <li class="collection-item green lighten-3">{{ session('message')[0] }}</li>
</ul>
@endif

<div class="row teal lighten-4">
  <div class="col s6 offset-s3">
    @if (!is_null($detail_orders))
    @foreach ($detail_orders as $detail_order)
    <ul class="collection">
      <li class="collection-item avatar">
        <img src="{{ $detail_order->food->image }}" alt="" class="square">
        <span class="title"><b style="color:#0d47a1">{{ $detail_order->food->name }}</b></span>
        <p><b>Orderer:</b> {{ $detail_order->user->name }} <br>
         <b>Amount:</b> {{ $detail_order->amount }}
       </p>
       @if (!Auth::guest())
       @if ($detail_order->user_id == \Auth::user()->id || \Auth::user()->isAdmin == true)
       {!! Form::open(['method'=>'DELETE', 'url'=>'orders/'.$detail_order->id.'/'.$detail_order->user_id]) !!}
       <button type="submit" class="secondary-content"><i class="mdi-action-delete"></i></button>
       {!! Form::close() !!}
       @endif
       @endif
     </li>
   </ul>
   @endforeach
   @else
   <ul class="collection">
    <li class="collection-item">There's no order today</li>
  </ul>
</ul>
@endif
</div>
</div>
@stop