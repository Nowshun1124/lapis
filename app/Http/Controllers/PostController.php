<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index(Post $post){
        return view('posts/index')->with(['posts' => $post->getByLimit()]);
    }
    
    public function create()
    {
        return view('posts/create');
    }

    public function show(Post $post){
        return view('posts/show')->with(['post' => $post]);
    }

    public function store(Request $request, Post $post){
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id]; 
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];    
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
}
