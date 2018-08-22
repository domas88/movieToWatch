@extends('layouts.app')

@section('content')

<div class="container mt-3">
	<div class="row">
		@foreach ($genre as $val)
			@if ($val['img'] != 'empty')
				<div class="col">
					<a class="btn btn-info btn-xs btn-block" href="../show/{{$val['id']}}" role="button"><h5>{{$val['name']}}</h5></a>
				</div>
			@endif
		@endforeach
	</div>
</div>

<div class="container mb-5">
	<div class="row align-items-center">

			@foreach($movie as $key)
				@if($loop->first)
					<div class="container mt-5">
						<div class="row align-items-center">
							<div class="col">
								<img src="http://image.tmdb.org/t/p/w300/{{$key['img']}}" class="img-thumbnail">
								<h3 class="display-5 mt-3">{{$key['title']}}</h3>
								<h4 class="display-5">{{$key['year']}}</h4>
								<a href="" class="btn btn-primary">Give Me Another!</a>
							</div>
							<div class="col">
								<p><em>{{$key['overview']}}</em></p>
							</div>
						</div>
						<h4 class="mt-5">Other movies you may like</h4>
					</div>
				@else
					<div class="col-2 mt-5 mb-5">
						<a href="../info/{{$key['id']}}">
							<img src="http://image.tmdb.org/t/p/w300/{{$key['img']}}" class="img-thumbnail">
							<h5 class="display-5 mt-3">{{$key['title']}}</h5>
							<h6 class="display-5">{{$key['year']}}</h6>
						</a>
					</div>
				@endif
			@endforeach
	
	</div>
</div>


@endsection


