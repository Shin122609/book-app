<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Auth::user()->genres;
        $priorities = Auth::user()->priorities;

        return view('genres.index',compact('genres', 'priorities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kind' => 'required',

        ]);

        $genre = new Genre();
        $genre->kind = $request->input('kind');
        $genre->user_id = Auth::id();
        $genre->save();

        return to_route('genres.index');

        }

        

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'kind' => 'required',

        ]);

        $genre->kind = $request->input('kind');
        $genre->user_id = Auth::id();
        $genre->save();

        return to_route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return to_route('genres.index');
    }
}
