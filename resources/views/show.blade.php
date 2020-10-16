@extends ('layouts.app')
@section('content')
    <ul>   
        <li><a href="{{route('movies.show', $movie->id)}}">{{$movie->title}}</a></li>   
        <li>{{$movie->genre}}</li>
        <li>{{$movie->director}}</li>
        <li>{{$movie->year}}</li>
    </ul>

@endsection