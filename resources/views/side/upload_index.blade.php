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
           <div class="up_header">
               <h1>楽曲登録</h1>
           </div>
           <div class="upload">
                <div class="upload_body">
                    <form method="post" action="/mu/upload/up" enctype="multipart/form-data">
                    @csrf
                        <div class="song">
                            <div class="jacket">
                                <p>ジャケット写真を登録</p>
                                <div class="input1">
                                    <input type="file" name="song_image" id="song_image">
                                    <img id="image">
                                </div>
                            </div>
                            <div class="music">
                                <p>音源をアップロード</p>
                                <div class="input2">
                                    <input type="file" name="song" id="song">
                                </div>
                            </div>
                        </div>
                        <div class="song_about">
                            <div class="title">
                                <p>楽曲名</p>
                                <div class="input3">
                                    <input id="U1" type="text" name="title">
                                </div>
                            </div>
                            <div class="lyric">
                                <p>歌詞を登録する</p>
                                <div class="input4">
                                    <textarea id="U2" name="lyric" placeholder="歌詞を記述" cols="100" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="explanation">
                                <p>概要欄</p>
                                <div class="input5">
                                    <textarea id="U3" name="explanation" placeholder="概要" cols="100" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="category">
                                <p>ジャンル</p>
                                <div class="input6">
                                    <select id="U4" name="category_id">
                                    @foreach($categories as $category)
                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <div class="btn1">
                                <a class="btn-flat"><input type="submit" class="button" value="アップロード"></a>
                            </div>
                            <div class="btn2">
                                <a class="btn-flat2" href="/">キャンセル</a>
                            </div>
                        </div>
                    </form>                  
               </div>
           </div>
            <script src="{{ asset('/js/upload_index.js') }}"></script>
        </body>
    </x-app-layout>
</html>