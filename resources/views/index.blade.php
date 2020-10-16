
    
@extends('layouts.app')
@section('content')
    @foreach ($data as $movie)
      <ul>
        
          <li><a href="{{route('movies.show', $movie->id)}}">{{$movie->title}}</a></li>
        
          <li>{{$movie->genre}}</li>
          <li>{{$movie->director}}</li>
          <li>{{$movie->year}}</li>
      </ul>  
          <form action="{{route('movies.destroy', $movie->id)}}" method="POST">
          
            @csrf
            @method('DELETE')
            <input type="submit" value="Cancella">
          </form>
    @endforeach

@endsection
