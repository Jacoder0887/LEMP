<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required|string|min:2',
            'body'=> 'required|string|min:2',
        ]);
        $data['author_id'] = 3;
        $data['body'] = Str::random();
        $post = Post::create($data);
         

        return response()->json([
            $post
            // 'id' => 1,
            // 'title'=> $data['title'],
            // 'body'=>  $data['body'],
        ], 201);
         
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    { 
        return response()->json([
            $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'=> 'required|string|min:2',
            'body'=> 'required|string|min:2',
        ]);

        $post->update($data);

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
