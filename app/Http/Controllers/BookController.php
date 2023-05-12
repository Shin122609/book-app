<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{

    public function store(Request $request, Genre $genre)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->user_id = Auth::id();
        $book->genre_id = $genre->id;
        $book->done = false;
        $book->save();

        $book->priorities()->sync($request->input('priority_ids'));

        return to_route('genres.index');

    }


    public function update(Request $request, Genre $genre, Book $book)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $book->title = $request->input('title');
        $book->user_id = Auth::id();
        $book->genre_id = $genre->id;
        $book->done = $request->boolean('done', $book->done);
        $book->save();

        if (!$request->has('done')) {
            $book->priorities()->sync($request->input('priority_ids'));
        }; 

        return redirect()->route('genres.index');
    }


    public function destroy(Genre $genre, Book $book)
    {
        $book->delete();

        return to_route('genres.index');
    }
}
