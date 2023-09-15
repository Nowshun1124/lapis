<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>レポートを作成する</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    
    <x-app-layout>
        <x-slot name="header">
        　  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lapis') }}
        　  </h2>
        </x-slot>
    <body style="text-align: center">
        <h1>LIVE REPORT</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="body">
                <h2>レポートを作成する</h2>
                <textarea name="post[body]" placeholder="ここに記入">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="ポスト"/>
        </form>
        <div class="footer">
            <a href="/">←</a>
        </div>
    </body>
    </x-app-layout>
</html>