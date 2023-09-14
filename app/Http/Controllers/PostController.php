<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Follow;
use App\Http\Requests\PostRequest;
use Auth;


class PostController extends Controller
{
    public function index(Post $post, Follow $follow){
        return view('posts/index')->with(['posts' => $post->getByLimit(), 'follows' => $follow]);
    }
    
    public function create()
    {
        return view('posts/create');
    }

    public function show(Post $post){
        //dd($post->user->profile_photo_path);
        return view('posts/show')->with(['post' => $post]);
    }

    public function store(PostRequest $request, Post $post)
    {
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
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        Like::create([
          'post_id' => $id,
          'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'You Liked the Post.');

        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        session()->flash('success', 'You Unliked the Reply.');

        return redirect()->back();
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
