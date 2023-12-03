<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $quest= $request->search;
        if(!empty($quest)){
        $data['movies'] = Movie::where("movie_name","like","%".$quest."%")->paginate(5);
        }else{
        $data['movies'] = Movie::orderBy('id','desc')->paginate(5);
        }
        return view('movies.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
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
            'name' => 'required',
            'description' => 'required'
        ]);
        $movie = new Movie();
        $movie->movie_name = $request->name;
        $movie->movie_description = $request->description;
        $movie->movie_gener = $request->gener;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extintion= $image->getClientOriginalExtension();
            $imagename = time().'.'.$extintion;
            // public_path('images') => storage_path('app/images'),
            $request->image->move(public_path('image'), $imagename);
            $movie->movie_img = $imagename;
        }
        $movie->save();
        return redirect()->route('movies.index')->with('success','Successfully added');
        // $movie->movie_img = $request->image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $movie = Movie::find($id);
        $movie->movie_name = $request->name;
        $movie->movie_description = $request->description;
        $movie->movie_gener = $request->gener;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extintion= $image->getClientOriginalExtension();
            $imagename = time().'.'.$extintion;
            // public_path('images') => storage_path('app/images'),
            $request->image->move(public_path('image'), $imagename);
            $movie->movie_img = $imagename;
        }
        $movie->save();
        return redirect()->route('movies.index')->with('success','Successfully edited');
        // $movie->movie_img = $request->image;
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
        return redirect()->route('movies.index')->with('success','deleted successfuly');
    }
    // public function search(Request $request)
    // {
    //     $search = $request->search; 
    //     dd();
    //     //? $request->search :''
    //     $result = Movie::where(function ($query) use ($search) {
    //         $query->where('movie_name', 'like', '%' . $search . '%')
    //             ->orWhere('movie_description', 'like', '%' . $search . '%');
    //     })->get();
    //     return redirect()->route('movies.index')->with('success','nn');
    // }
}
