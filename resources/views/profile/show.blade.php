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
        <x-slot name="header">
        　  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        　  </h2>
        </x-slot>
    <body>
        <div class="body">
            <div class='user-info'>
                <div class="profile_photo">
                    <a>
                    <img id="user_icon" src="{{ asset('storage/'.($user->profile_photo_path ?? 'user_icon.jpg')) }}" alt="">
                    </a>
                </div>
                <div class="profile_list">
                    @if( $user->account_type === 1)
                    <a>{{ $user->name }} <i class="fa-solid fa-music"></i></a>
                    @else
                    <a>{{ $user->name }}</a>
                    @endif
                    
                    @if (Auth::user()->id != $user->id)
                    @if (Auth::user()->isFollowing($user->id))
                        <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-danger">フォロー中</button>
                        </form>
                    @else
                        <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            
                            <button type="submit" class="btn btn-danger">フォローする</button>
                        </form>
                    @endif
                    @endif
                    <div class="follow_number">
                        <a>フォロワー {{ $user->followers->count() }}人</a>
                        <a>フォロー中 {{ $user->follows->count() }}人</a>
                    </div>
                    <div class="posts_count">
                        <a>投稿 {{ $user->posts->count() }}件</a>
                    </div>
                </div>
                <div class="profile_sentence">
                    <p>{{ old('introduction', $user->introduction )}}</p>
                </div>
            </div>    
        </div>
    </body>
    </x-app-layout>
</html>