@if ($errors->any())
	<ul class="collection">
		@foreach ($errors->all() as $error)
			<li class="collection-item red lighten-4">{!! $error !!}</li>
		@endforeach
	</ul>	
@endif