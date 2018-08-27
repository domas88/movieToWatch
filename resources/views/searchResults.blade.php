@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h4 style="text-align: center">Search results:</h4>
        <div class="row mt-5">
            @foreach ($results as $val)
                <div class="col">
                    <a href="{{route('info', [$val['id']])}}">
                        <h4>{{$val['title']}}</h4>
                        <img class="rounded" src="http://image.tmdb.org/t/p/w300/{{$val['img']}}" style="height: 250px">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

