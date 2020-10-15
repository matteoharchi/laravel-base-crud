@extends('layouts.app')
@section('content')
    @foreach ($data as $movie)
      <ul>
          <li>{{$movie->title}}</li>
          <li>{{$movie->genre}}</li>
          <li>{{$movie->director}}</li>
          <li>{{$movie->year}}</li>
      </ul>  
    @endforeach

@endsection