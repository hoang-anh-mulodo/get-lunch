@extends('app')
@section('content')

@if (session()->has('message'))
<ul class="collection">
  <li class="collection-item green lighten-3">{{ session('message')[0] }}</li>
</ul>
@endif
<div class="row teal lighten-4" style="">
  <div class="col s12">
    <?php echo $foods->render(); ?>
  </div>
  @foreach ($foods as $food)
  <div class="col s3">
    <div class="card">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" style="width:100%;height:200px" src="{{ $food->image }}">
      </div>
      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4" style="font-size:1.1em">{{ mb_strimwidth($food->name, 0, 30, "...") }} 
        </span>
      </div>
      @if (!Auth::guest())
      <hr/>    
      <form method="post" action="{{ url('orders/'.$food->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="amount">Amount</label>
        <input class="left" type="text" name="amount" value="1" style="margin:0;text-align:center">
        @if (Auth::user()->isAdmin == true)
        <button class="right" type="submit" style="width:50%"><i class="mdi-action-shopping-cart"></i></button>
        <a href="{{ url('foods/'.$food->id.'/edit') }}"><button type="button" class="right" style="width:50%"><i class="mdi-content-create"></i></button></a>
        @else
        <button class="right" type="submit" style="width:100%"><i class="mdi-action-shopping-cart"></i></button>
        @endif
      </form>
      @endif
      <!-- <span><i class="mdi-action-shopping-cart right"></i></span> -->
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">{{ $food->name }} <i class="mdi-navigation-close right"></i></span>
        <p>{{ $food->description }}</p>
      </div>
    </div>
  </div>
  @endforeach
  <!-- <div class="next-page">
    <a href="{{ $foods->nextPageUrl() }}"><i class="mdi-hardware-keyboard-arrow-right"></i></a>
  </div> -->
</div>
@stop