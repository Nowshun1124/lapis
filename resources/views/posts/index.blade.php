<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホーム</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
            <div class="homebody">
                <h1>LIVE REPORT</h1>
                <div class='posts'>
                    @foreach ($posts as $post)
                        <div class="post-header">
                            <div class='user-info'>
                                <a href="/profile/shows/{{ $post->user->id }}">
                                    <img id="user_icon" src="{{ asset('storage/'.($post->user->profile_photo_path ?? 'user_icon.jpg')) }}" alt="">
                                </a>
                            @if( $post->user->account_type === 1)
                            <a href="/posts/{{ $post->id }}">{{ $post->user->name }}.  <i class="fa-solid fa-music"></i></a>
                            @else
                            <a href="/posts/{{ $post->id }}">{{ $post->user->name }}.  <i class="fa-solid fa-headphones"></i></a>
                            @endif
　　　　　　　　　　        </div>
　　　　　　　　　　        <div class="text-muted small mt-2">
                                <a>投稿日 : <strong>{{$post->created_at->diffForHumans()}}</strong></a>
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="post-content">
                                <p>{{ $post->body }}</p>
                            </div>
                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                               <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                            </form>    
                        </div>
                        <div>
                            @if($post->is_liked_by_auth_user())
                                <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-heart"></i>{{ $post->likes->count() }}</span></a>
                            @else
                                <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm"><i class="fa-regular fa-heart"></i>{{ $post->likes->count() }}</span></a>
                            @endif
                        </div>
                            <div class="px-4 pt-3">
                                @if ($post->comments->count())
                                    <a href="/posts/{{ $post->id }}"><i class="fa-solid fa-comment"></i> {{$post->comments->count()}}</a>
                                @else
                                    <a><i class="fa-regular fa-comment"></i> 0</a>
                                @endif
                            </div>
                    
                            <div class="card mb-4">
                                <form method="post" action="{{route('comment.store')}}">
                                    @csrf
                                    <input type="hidden" name='post_id' value="{{$post->id}}">
                                    <div class="form-group">
                                        <textarea name="body" class="form-control" id="body" cols="30" rows="1" placeholder="コメントを入力する">{{old('body')}}</textarea>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button class="btn btn-success float-right mb-3 mr-3">コメントする</button>
                                    </div>
                                </form>
                            </div>
                    @endforeach  
                    
                </div>
            </div>
            <script src="{{ asset('/js/home.js') }}"></script>
        </body>
    </x-app-layout>
</html>