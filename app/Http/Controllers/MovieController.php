<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Movie::all(); //prendo i campi del modello inseriti nel DB
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title'=>'required|max:100|min:2',
            'genre'=>'required|max:100|min:2',
            'director'=>'required|max:100|min:4',
            'year'=>'required|numeric',


        ]);
        $newMovie= new Movie;
        // $newMovie->title = $data['title'];
        // $newMovie->genre = $data['genre'];
        // $newMovie->director = $data['director'];
        // $newMovie->year = $data['year'];
        $newMovie->fill($data);
        $saved = $newMovie->save();

        if ($saved) {
            return redirect()->route('movies.index');
        }

        if (empty($data['title']) || empty($data['genre']) || empty($data['director']) || empty($data['year'])) {
            return back()->withInput();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        // $movie= Movie::find($id); non mi serve più avendo impostato movie come argomento
        return view('show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('create', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        
        $data = $request->all();
        $movie->update($data);
        return redirect()->route('movies.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
    
        return redirect()->route('movies.index');
    }
}
