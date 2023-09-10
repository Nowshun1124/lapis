<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザーさんのプロフィール</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
        　  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        　  </h2>
        </x-slot>
    <body>
        <div class="profile">
            <img src="{{ isset(Auth::user()->profile_photo_path) ? asset('storage/' . Auth::user()->profile_photo_path) : asset('images/user_icon.png') }}" alt="" class="w-16 h-16 rounded-full object-cover border-none bg-gray-200">
            <div class="profile-name">
                <p>{{ $users->name }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">←</a>
        </div>
    </body>
    </x-app-layout>
</html>