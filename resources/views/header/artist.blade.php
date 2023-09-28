<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Lapis</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/artist.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
            <div class="a_header">
                <h1>アーティスト一覧</h1>
            </div>
            <div class="artist">
                <div class="a_body">
                    <div class="search_box">
                    　  <form action="{{ route('artist') }}" method="GET" class="search-form">
                            <div class="searchbox">
                                <div class="search_input"><input type="text" name="keyword" value="{{ $keyword }}" placeholder="ワード検索"></div>
                                <div class="inbtn">
                                    <button class="btn1">
                                        <a>検索</a>
                                    </button>
                                </div>
                            </div>
                        </form>    
                    </div>
                    <div class="artist_list">
                        @forelse($users as $user)
                        @if($user->account_type === 1)
                        <div class="content_box">
                            <div class="icon">
                                <a href="/profile/shows/{{ $user->id }}">
                                    <img id="user-icon" src="{{ $user->profile_photo_path }}" alt="">
                                </a>
                            </div>    
                            <p>{{ $user->name }}</p>
                        </div>
                        @endif
                        @empty
                        <td>検索結果なし</td>
                        @endforelse
                    </div>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>