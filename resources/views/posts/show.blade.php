<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー：{{ $post->user->name }}さんの投稿</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
         <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <x-slot name="header">
        　  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lapis') }}
        　  </h2>
        </x-slot>
    <body>
        <div class="home">
            <div class="right">
                <form action="{{ route('index') }}" method="GET" class="search-form">
                    <div class="searchbox">
                        <div class="search_input"><input type="text" name="keyword" value="{{ $keyword }}" placeholder="ワード検索"></div>
                        <div class="inbtn">
                            <button class="btn1">
                                <a>検索</a>
                            </button>
                        </div>
                    </div>
                </form>    
                <div class="followlist">
                    <div class="f_header">
                        <p>フォロー中</p>
                    </div>
                    <div class="follows">
                        @foreach(Auth::user()->follows as $user)
                        <a href="/profile/shows/{{ $user->id }}">
                            <p>{{ $user->name }}</p>
                        </a>
                        @endforeach
                    </div>
                </div>                   
            </div>
                <div class="homebody">
                    <div class="hh">
                        <div class="hh1">
                            <h1>{{ $post->title }}</h1>
                        </div>
                    </div>
                    <div class="postlist">
                        <div class="posts">
                            <div class="post-header">
                                <div class='user-info'>
                                    <a href="/profile/shows/{{ $post->user->id }}">
                                        <img id="user_icon" src="{{ $post->user->profile_photo_path ?? 'user_icon.jpg' }}" alt="">
                                    </a>
                                    @if( $post->user->account_type === true)
                                    <a class="name" href="/posts/{{ $post->id }}">{{ $post->user->name }}.  <i class="fa-solid fa-music"></i></a>
                                    @else
                                    <a class="name" href="/posts/{{ $post->id }}">{{ $post->user->name }}.  <i class="fa-solid fa-headphones"></i></a>
                                    @endif
                                    <a class="postdate">投稿日 : <strong>{{$post->created_at->diffForHumans()}}</strong></a>
　　　　　　　　　　            </div>
                            </div>
                            <div class="postbody">
                                <p>{{ $post->body }}</p>
                                <div class="photo">
                                    <img id="postimage" src="{{ $post->image_path }}" alt="">
                                </div>
                            </div>
                            <div class="likes_comment">
                                <div class="likes_comment_btn">
                                    @if($post->is_liked_by_auth_user())
                                    <a class="like" href="{{ route('post.unlike', ['id' => $post->id]) }}"><i class="fa-solid fa-heart"></i>{{ $post->likes->count() }}</a>
                                    @else
                                    <a class="like" href="{{ route('post.like', ['id' => $post->id]) }}"><i class="fa-regular fa-heart"></i>{{ $post->likes->count() }}</a>
                                    @endif
                                    @if ($post->comments->count())
                                    <a class="comment" href="/posts/{{ $post->id }}"><i class="fa-solid fa-comment"></i>{{$post->comments->count()}}</a>
                                    @else
                                    <a class="comment"><i class="fa-regular fa-comment"></i>0</a>
                                    @endif
                                </div>
                            
                                <form method="post" action="{{route('comment.store')}}">
                                @csrf
                                    <div class="commentform">
                                        <input type="hidden" name='post_id' value="{{$post->id}}">
                                        <div class="form-group">
                                            <textarea name="body" class="form-control" id="body" cols="30" rows="1" placeholder="コメントを入力する">{{old('body')}}</textarea>
                                        </div>
                                        <div class="commentbtn">
                                            <button class="btn">
                                                <a>返信</a>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @forelse ($post->comments as $comment)
                        <div class="posts">
                            <div class="post-header">
                                <div class='user-info'>
                                    <a href="/profile/shows/{{ $comment->user->id }}">
                                        <img id="user_icon" src="{{ $comment->user->profile_photo_path }}" alt="">
                                    </a>
                                    @if( $post->user->account_type === true)
                                    <a class="name" href="/posts/{{ $comment->id }}">{{ $comment->user->name }}.  <i class="fa-solid fa-music"></i></a>
                                    @else
                                    <a class="name" href="/posts/{{ $comment->id }}">{{ $comment->user->name }}.  <i class="fa-solid fa-headphones"></i></a>
                                    @endif
                                    <a class="postdate">投稿日 : <strong>{{$comment->created_at->diffForHumans()}}</strong></a>
　　　　　　　　　　            </div>
                            </div>
                            <div class="postbody">
                                <p>{{ $comment->body }}</p>
                            </div>
                        </div>
                        @empty
                        <td>コメントはありません。</td>
                        @endforelse
                    </div>    
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>