<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Song;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use Auth;



class PostController extends Controller
{
    public function index(Request $request, Post $post){
        $keyword = $request->input('keyword');
        
        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('body', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->latest()->get();
        
        return view('posts/index', compact('posts', 'keyword'));
    }
    
    public function create()
    {
        return view('posts/create');
    }

    public function show(Request $request, Post $post){
        //dd($post->user->profile_photo_path);
        
        $keyword = $request->input('keyword');
        
        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('body', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->latest()->get();
        
        return view('posts/show', compact('post', 'keyword'));
    }

    public function store(PostRequest $request, Post $post)
    {
        $photo_path = null;
        if ($request->hasFile('p_image')) {
            $photo_path = $request->file('p_image')->store('post_image', 'public');
            $request->user()->posts->image_path = $photo_path;
        }
    
        $inputs = request();
        
        $post = Post::create([
            'image_path' => $photo_path,
            'body' => $inputs['body'],
            'title' => $inputs['title'],
            'user_id' => auth()->user()->id
        ]);
         
        //$input = $request['post'];
        //$input += ['user_id' => $request->user()->id]; 
        //$post->fill($input)->save();
        return back();
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
    
    public function upload_index(Category $category)
    {
        return view('side/upload_index')->with(['categories' => $category->get()]);
    }
    
    public function upload(Request $request, Song $song)
    {
       //dd($song);
       
        $jacket_path = null;
        if ($request->hasFile('song_image')) {
            $jacket_path = $request->file('song_image')->store('jacket_photo', 'public');
            $request->user()->songs->song_image_path = $jacket_path;
        }
        
        $song_path = $request->file('song')->store('songs', 'public');
        $request->user()->songs->song_file_path = $song_path;
        
        $inputs = request();
        
        $song = Song::create([
            'song_file_path' => $song_path,
            'song_image_path' => $jacket_path,
            'title' => $inputs['title'],
            'lyric' => $inputs['lyric'],
            'explanation' => $inputs['explanation'],
            'category_id' => $inputs['category_id'],
            'user_id' => auth()->user()->id,
        ]);
        
        //dd($song);
        return redirect('/songs/info/' . $song->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/profile/shows/' . $post->user->id);
    }
    
    public function s_delete(Song $song)
    {
        $song->delete();
        return redirect('/profile/shows/' . $song->user->id);
    }
}
