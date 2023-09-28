<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー{{ $user->name }}さんのプロフィール</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/show_profile.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
    <body>
        
        <div class='pro_header'>
            <div class="profile_photo">
                <a><img id="user_icon" src="{{ $user->profile_photo_path }}" alt=""></a>
            </div>
            <div class="user_info">
                <div class="users">
                    @if( $user->account_type === 1)
                    <a class="an">{{ $user->name }}.  <i class="fa-solid fa-music"></i></a>
                    @else
                    <a class="an">{{ $user->name }}. <i class="fa-solid fa-headphones"></i></a>
                    @endif
                    <p class="follows">
                        <a>フォロワー {{ $user->followers->count() }}人</a>
                        <a>フォロー中 {{ $user->follows->count() }}人</a>
                    </p>
                    <p class="postnm">投稿 {{ $user->posts->count() }}件</p>
                </div>
            </div>
            <div class="profile_sentence">
                <p>{{ old('introduction', $user->introduction )}}</p>
            </div>
            <div class="follow">
                @if (Auth::user()->id != $user->id)
                @if (Auth::user()->isFollowing($user->id))
                    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            
                        <a class="btn btn--orange"><button type="submit" class="btn btn-danger">フォロー中</button></a>
                    </form>
                @else
                    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        <a class="btn btn--orange"><button type="submit" class="btn btn-danger">フォローする</button></a>
                    </form>
                @endif
                @endif
            </div>
        </div>
        <div class="profiles">
            <div class="pro_body">
                <div class="list_header">
                    <h1>楽曲リスト</h1>
                </div>
                <div class="songs_list">
                @foreach($user->songs as $song)
                    <div class="content_box">
                        <div class="music_con">
                            <a href="/songs/info/{{ $song->id }}"><img id="jacket_photo" src="{{ $song->song_image_path }}" alt=""></a>
                        </div>
                        <div class="tn">
                            <p class="title">{{ $song->title }}</p>
                            <p class="artist">{{ $song->user->name }}</p>
                        </div>
                        <div class="btn">
                            <audio controls id="songs" src="{{ asset('storage/'.($song->song_file_path)) }}"></audio>
                        </div>
                        <div class="genrename">
                            <a href="">{{ $song->category->name }}</a>
                        </div>    
                    </div>
                @endforeach
                </div>
                @if($user->account_type === 1)
                <div class="d_header">
                    <h1>寄付金・メッセージ</h1>
                </div>
                <div class="donations">
                    @foreach($user->donated as $donated)
                        <div class="d_box">
                            <p>¥ {{ $donated->money }}</p>
                            <p>{{ $donated->message }}</p>
                        </div>
                    @endforeach
                </div>
                @endif
                <div class="p_header">
                    <h1>投稿一覧</h1>
                </div>
                <div class="postlist">
                    @foreach($user->posts as $post)
                        <div class="p_box">
                            <a href="/posts/{{ $post->id }}">{{ $post->body }}</a>
                            @if(Auth::user()->id === $user->id)
                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn"><button type="button" onclick="deletePost({{ $post->id }})">削除</button></a>
                            </form>
                            @endif
                        </div>    
                    @endforeach
                </div>
            </div>
        </div>
        <script>
        function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
        }
        </script>
    </body>
    </x-app-layout>
</html>