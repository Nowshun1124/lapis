<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
        　 Lapis
        </x-slot>
        <body>
            <h1>Blog Name</h1>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <p class='body'>{{ $post->body }}</p>
                    </div>
                    <small>{{ $post->user->name }}</small>
                @endforeach  
            </div>
            {{ Auth::user()->name }}
        </body>
    </x-app-layout>
</html>