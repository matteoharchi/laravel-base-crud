<form action="{{route('movies.store')}}" method="post">
    @csrf
    @method('POST')
    <label for="title">Titolo</label>
    <input type="text" name="title" placeholder="Titolo" value="{{old('title')}}">

    <label for="genre">Genere</label>
    <input type="text" name="genre" placeholder="Genere" value="{{old('genre')}}">
    
    <label for="director">Regista</label>
    <input type="text" name="director" placeholder="Regista" value="{{old('director')}}">
    
    <label for="director">Anno di produzione</label>
    <input type="text" name="year" placeholder="Anno di produzione" value="{{old('year')}}">

    <input type="submit" value="Invia">
</form>