<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Lapis</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/upload_index.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
           <header>動画をアップロード</header>
           <div class="upload">
               <form method="post" action="/mu/upload/up" enctype="multipart/form-data">
                    @csrf
                    <label>YoutubeのURLを記入</label>
                    <input type="url" placeholder="https://youtube.com/">
                    <label>タイトル</label>
                    <input name="title" type="text" placeholder="動画のタイトルを記入">
                    <label>概要欄</label>
                    <textarea name="overview" placeholder="概要欄"></textarea>
                    <button type="submit" class="button">アップロード</button>
               </form>
           </div>
        </body>
    </x-app-layout>
</html>