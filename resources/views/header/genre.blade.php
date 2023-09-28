<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Lapis</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/songs.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
            <div class="s_header">
                <h1>楽曲一覧</h1>
            </div>
            <div class="songs">
                <div class="s_body">
                    <div class="search">
                    　　<div class="keyform">
                        　　<form action="{{ route('songs') }}" method="GET" class="search-form-001">
                        　　      <label>
                        　　         <input type="text" name="keyword" value="{{ $keyword }}" placeholder="曲名を検索">
                        　　      </label>
                            　　<button type="submit">検索</button>
                        　　</form>
                    　　</div>
                    　　<div class="genre">
                        　　<p>ジャンルから絞る</p>
                        　　@foreach($categories as $category)
                            　　<a class="genrebtn" href="/categories/{{ $category->id }}"><span>{{ $category->name }}</span></a>
                        　　@endforeach
                    　　</div>
                    </div>
             <div class="songs_list">
                        @forelse($songs as $song)
                        <div class="content_box">
                            <div class="music_con">
                                <img id="jacket_photo" src="{{ $song->song_image_path }}" alt="">
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
                        @empty
                        <td>検索結果なし</td>
                        @endforelse
                    </div>
            </div>                
        </body>
    </x-app-layout>
</html>