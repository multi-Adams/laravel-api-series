<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
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
            'title' => 'required',
            'author_id' => 'required',
            'body' => 'required'
        ]);
        return Post::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return Post::find($id);
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
        $book = Post::find($id);
        $book->update($request->all());
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::destroy($id);
    }

        /**
     * Search the storage with a given text.
     *
     * @param  int  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return  Post::where('title', 'like', '%' . $title . '%')->get();
    } 


        /**
     * Get author of a post
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_author($id)
    {
        $author = Post::find($id)->author;
        return $author;
    }

    // create a function to get all posts   of a given author
    public function get_posts($id)
    {
        $posts = Post::where('author_id', $id)->get();
        return $posts;
    }
    
}
