<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\User;
use App\Models\Category;

class ViewController extends Controller
{
    public function songs(Request $request, Song $song, Category $category) 
    {
        $keyword = $request->input('keyword');
        
        $query = Song::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        $songs = $query->latest()->get();
        
        return view('header/songs', compact('songs', 'keyword'))->with(['categories' => $category->getByLimit()]);

        //return view ('header/songs')->with(['songs' => $song->getByLimit()]);
    }
    
    public function info(Song $song) {
        return view('header/songs_info')->with(['song' => $song]);
    }
    
    public function index(Request $request, Category $category)
    {
        $keyword = $request->input('keyword');
        
        $query = Song::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        $songs = $query->latest()->get();
        
        
        return view('header/genre', compact('songs', 'keyword'))->with(['songs' => $category->getByCategory(), 'categories' => $category->getByLimit()]);
    }
    
    public function artist(Request $request, User $user) 
    {
        $keyword = $request->input('keyword');
        
        $query = User::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $users = $query->get();
        
        return view('header/artist', compact('users', 'keyword'));
        //return view ('header/artist')->with(['users' => $user->getByLimit()]);
    }
    
    public function youtube()
    {
        return view ('header/youtube');
    }
    
    public function yt_index()
    {
        return view ('side/yt_index');
    }
}
