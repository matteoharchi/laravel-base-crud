@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{(!empty($movie))?route('movies.update', $movie->id):route('movies.create')}}" method="post">
        @csrf
        @if(!empty($movie))
            @method('PATCH')
             <input type="hidden" name = 'id' value= "{{$movie->id}}">          
        @else
            @method('POST')
        @endif
        <label for="title">Titolo</label>
        <input type="text" name="title" placeholder="Titolo" value="{{(!empty($movie))? $movie->title : old('title')}}" required>

        <label for="genre">Genere</label>
        <input type="text" name="genre" placeholder="Genere" value="{{(!empty($movie))? $movie->genre : old('genre')}}" required>
        
        <label for="director">Regista</label>
        <input type="text" name="director" placeholder="Regista" value="{{(!empty($movie))? $movie->director : old('director')}}" required>
        
        <label for="director">Anno di produzione</label>
        <input type="text" name="year" placeholder="Anno di produzione" value="{{(!empty($movie))? $movie->year : old('year')}}" required>

        <input type="submit" value="Invia">
    </form>
@endsection