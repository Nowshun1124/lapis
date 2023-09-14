<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use Auth;

class FollowController extends Controller
{
    public function follow(User $user) {
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            //フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    public function unfollow(User $user) {
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            //フォローしていなければフォローする
            $follower->unfollow($user->id);
            return back();
        }
    }
}
