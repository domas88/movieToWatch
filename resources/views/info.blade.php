@extends('layouts.app')

	@foreach($movie as $key)
	
		@section('movieImage')
			{{ 'http://image.tmdb.org/t/p/w300' . $key['img'] }}
		@endsection

		@section('movieTitle')
			<h3>{{ $key['title'] }}</h3>
		@endsection

		@section('overview')
		<h5>Overview</h5>
		{{$key['overview']}}
		@endsection

		@section('year')
		{{$key['year']}}
		@endsection

	@endforeach