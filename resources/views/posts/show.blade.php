<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー：{{ $post->user->name }}さんの投稿</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/show.css') }}">
    </head>
    <x-app-layout>
        <x-slot name="header">
        　  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lapis') }}
        　  </h2>
        </x-slot>
    <body>
        <div class="content">
            <div class="content__post">
                <div class='user-info'>
                    <a href="/profile/shows">
                        <img id="user_icon" src="{{ asset('storage/'.($post->user->profile_photo_path)) }}" alt="">
                        <p>{{ $post->user->profile_photo_path }}</p>
                    </a>
                    <a href="/posts/{{ $post->id }}">{{ $post->user->name }}</a>
　　　　　　　　</div>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        @foreach ($post->comments as $comment)
            <div class="card mb-4">
                <div class='user-info'>
                    <a href="/profile/shows">
                        <img id="user_icon" src="{{ asset('storage/'.($comment->user->profile_photo_path ?? 'user_icon.jpg')) }}" alt="">
                    </a>
                    <a href="/posts/{{ $post->id }}">{{ $post->user->name }}</a>
　　　　　　　　</div>
                <div class="card-body">
                　　{{$comment->body}}
                </div>
                <div class="card-footer">
                    <span class="mr-2 float-right">
                        投稿日時 {{$comment->created_at->diffForHumans()}}
                    </span>
                </div>
            </div>
        @endforeach
        <div class="footer">
            <a href="/">←</a>
        </div>
    </body>
    </x-app-layout>
</html>