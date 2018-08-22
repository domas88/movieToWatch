@extends('layouts.app')
@section('content')

<div class="container text-center mb-3">
    <h2>Movie<br>2<br>Watch</h2>
    <h4>Just press on the image and you`l get the <br> Movie!</h4>
</div>

<div class="container mt-3">
	<div class="row">
		<div class="col align-self-center">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
				</ol>
				<div class="carousel-inner">
					@foreach ($genre as $val)
						@if ($val['img'] != 'empty')
							@if ($loop->first)
								<div class="carousel-item active">
									<a href="show/{{$val['id']}}">
									<img class="d-block w-100 rounded" src="{{$val['img']}}" alt="First slide" style="height: 750px">
									</a>
									<div class="carousel-caption d-none d-md-block">
									    <h3>{{$val['name']}}</h3>
									</div>
								</div>
							@else
								<div class="carousel-item">
									<a href="show/{{$val['id']}}">
									<img class="d-block w-100 rounded" src="{{$val['img']}}" alt="Second slide" style="height: 750px">
									</a>
									<div class="carousel-caption d-none d-md-block">
								    	<h3>{{$val['name']}}</h3>
									</div>
								</div>
							@endif
						@endif	
					@endforeach
				</div>

					{{-- <div class="carousel-item">
						<a href="show?genreId=horror">
						<img class="d-block w-100 rounded" src="https://m.media-amazon.com/images/M/MV5BMDRlMzQ3OGItZmIzNS00OTg1LThlN2ItMjQ0ZDYzZjQzYTkwXkEyXkFqcGdeQXVyNjUwNzk3NDc@._V1_.jpg" alt="Third slide" style="height: 750px">
						</a>
					<div class="carousel-caption d-none d-md-block">
					    <h3>Horror</h3>
					</div>
					</div>
					<div class="carousel-item">
						<a href="show?genreId=sciense">
						<img class="d-block w-100 rounded" src="https://m.media-amazon.com/images/M/MV5BYTI5YTQyYTYtYmVmMC00ZDE0LWI1NzktNzAwMWQ3OWJhMzM5XkEyXkFqcGdeQXVyNzc5NjM0NA@@._V1_.jpg" alt="Third slide" style="height: 750px">
						</a>
					<div class="carousel-caption d-none d-md-block">
					    <h3>Scy-Fy</h3>
					</div>
					</div>
					<div class="carousel-item">
						<a href="show?genreId=drama">
						<img class="d-block w-100 rounded" src="https://m.media-amazon.com/images/M/MV5BMTk3MDAwMzcyOF5BMl5BanBnXkFtZTcwOTg5ODMyMw@@._V1_SX1520_CR0,0,1520,999_AL_.jpg" alt="Third slide" style="height: 750px">
						</a>
					<div class="carousel-caption d-none d-md-block">
					    <h3>Drama</h3>
					</div>
					</div> --}}
				
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
			</div>
		</div>
	</div>
</div>

<div class="container mt-5 mb-5">
<h4 style="text-align: center">Other movies</h4>
	<div class="row mt-5">
		@foreach ($random as $val)
			<div class="col">
				<a href="info/{{$val['id']}}">
					<h4>{{$val['title']}}</h4>
					<img class="rounded" src="http://image.tmdb.org/t/p/w300/{{$val['img']}}" style="height: 250px">
				</a>
			</div>
		@endforeach
	</div>
	<div class="row justify-content-center mb-4 mt-3">
		{!! $random->links() !!}
	</div>
</div>

@endsection