<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>楽曲 {{ $song->title }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/songs_info.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
    <body>
        
        <div class='pro_header'>
            <div class="profile_photo">
                <a><img id="jacket_photo" src="{{ $song->song_image_path }}" alt=""></a>
            </div>
            <div class="user_info">
                <div class="users">
                    <p class="ts">楽曲</p>
                    <p class="song_title">{{ $song->title }}</p>
                    <div class="com_info">
                        <a><img id="user_icon" src="{{ $song->user->profile_photo_path }}" alt=""></a>
                        <a href="/profile/shows/{{ $song->user->id }}" class="composer">{{ $song->user->name }}</a>
                    </div>
                </div>
                <div class="audio">
                    <audio controls id="songs" src="{{ asset('storage/'.($song->song_file_path)) }}"></audio>
                </div>
            </div>
            <div class="header_ls">
                <div class="ex">
                    <h1>概要欄</h1>
                    <p>{{ $song->explanation }}</p>
                </div>
                @if(Auth::user()->id === $song->user->id)
                <div class="d_form">
                    <form action="/songs/{{ $song->id }}" id="form_{{ $song->id }}" method="post">
                    @csrf
                    @method('DELETE')
                        <a><button type="button" onclick="deletePost({{ $song->id }})">楽曲を消去する</button></a>
                    </form>
                </div>    
                @endif
            </div>
        </div>
        <div class="information">
            <div class="si_body">
                <div class="lyric_title">
                    <h1>歌詞</h1>
                </div>
                <div class="lyric">
                    <p>{{ $song->lyric }}</p>
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