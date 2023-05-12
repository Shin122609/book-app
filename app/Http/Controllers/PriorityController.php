<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PriorityController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',

        ]);

        $priority = new Priority();
        $priority->level = $request->input('level');
        $priority->user_id = Auth::id();
        $priority->save();

        return to_route('genres.index');

        }

    

    public function update(Request $request, Priority $priority)
    {
        $request->validate([
            'level' => 'required',

        ]);

        $priority->level = $request->input('level');
        $priority->user_id = Auth::id();
        $priority->save();

        return to_route('genres.index');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();

        return to_route('genres.index');
    }
}
