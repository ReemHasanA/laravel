<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
// use Illuminate\Http\Request;
// use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
    {
        $posts = Post::all();

        return response()->json([
            "data"=> $posts
            ]);
            
        
        // return [
        //     'id' => $this->id,
        //     'title' => $this->name,
        //     'content' => $this->content,
        //     'created_at' => $this->created_at,
        // ];
        // return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $posts = Post::create($request->all());
        
        return new PostResource($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        
        $post->update($request->all());
        
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response(null, 204);
    }
}

