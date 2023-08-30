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
        @extends('layouts.app')

        @section('content')
            <div class="own_posts">
                @foreach($own_posts as $post)
                    <div>
                        <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                        <small>{{ $post->user->name }}</small>
                        <p>{{ $post->body }}</p>
                    </div>
                @endforeach
   
                <div class='paginate'>
                    {{ $own_posts->links() }}
                </div>
            </div>
        @endsection
    </x-app-layout>
</html>