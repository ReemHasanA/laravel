<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::with("movie")->get();
        return view("actors.index", compact("actors"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        return view("actors.create", compact("movies"));
     
        // return view('movies.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $movies=array();
        // foreach ($request->movie as $movie) {
        //     $movies_push($movie);}
        // }//? Movie::create($request->movie) : null;
            
        // dd($request->all());
        // while ($request->movie) {}
            $movies= $request->movie;
        
        $actor= Actor::create($request->all());
        $actor->movie()->attach($movies);
        return redirect()->route("actors.index")->with("success","Adde successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        return view("actors.show", compact("actor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        // $i=0;
        //->except(whereId($actor))->with("movie",)->except($taken);
        // $actors = Actor::with("movie")->get();,compact("taken")
        // $taken[$i++]=$actor->movie;
        // $unassignedMovies = $actor->movie()->whereNotIn('movie_id', $actor->movie)->get();
        $movies = Movie::all()->reject(function ($movie) use ($actor) {
            return $movie->actor->contains($actor);
        });
        // dd($movies);
        // dd($remind); 
        return view("actors.edit", compact("actor"),compact("movies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        $movies=$request->movie;
        // dd();
        $actor->update($request->all());
        $actor->movie()->attach($movies);
        return redirect()->route("actors.index")->with("success","updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route("actors.index")->with("success","successfully deleted");
    }
}
