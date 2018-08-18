@extends('layouts.app')

@section('content')
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<a href="show?genreId=action"><h5>Action</h5></a>
			</div>
			<div class="col">
				<a href="show?genreId=comedy"><h5>Comedy</h5></a>
			</div>
			<div class="col">
				<a href="show?genreId=horror"><h5>Horor</h5></a>
			</div>
			<div class="col">
				<a href="show?genreId=sciense"><h5>Scy-Fy</h5></a>
			</div>
			<div class="col">
				<a href="show?genreId=drama"><h5>Drama</h5></a>
			</div>
		</div>
	</div>

<div class="container">
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
			@endif
				<div class="col-2 mt-5 mb-5">
					<a href="info/{{$key['id']}}">
						<img src="http://image.tmdb.org/t/p/w300/{{$key['img']}}" class="img-thumbnail">
						<h5 class="display-5 mt-3">{{$key['title']}}</h5>
						<h6 class="display-5">{{$key['year']}}</h6>
					</a>
				</div>
		@endforeach
	</div>
</div>


@endsection


