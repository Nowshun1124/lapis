<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>レポートを作成する</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/create.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    
    <x-app-layout>
    <body>
        <div class="createheader">
            <h1>レポートを投稿する</h1>
        </div>
        <div class="create">
            <div class="createbody">
                <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="title">
                        <p>タイトル</p>
                        <div class="title_input">
                            <input id="text1" type="text" name="title" placeholder="タイトル" cols="100">
                        </div>
                    </div>
                    <div class="body">
                        <div class="body2">
                            <p class="body_p">投稿内容</p>
                            <textarea id="text2" name="body" placeholder="ここに記入" cols="100" rows="6">{{ old('post.body') }}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                        </div>
                    </div>
                    <div class="image">
                        <div class="image2">
                            <p>画像を添付</p>
                            <div class="image_file">
                                <input type="file" name="p_image" id="input_file">
                            </div>
                            <img id="post_image">
                        </div>
                    </div>
                    <div class="btn">
                        <div class="footer">
                            <div class="btn1">
                                <a class="btn-flat"><input type="submit" value="投稿する"/></a>
                            </div>
                            <div class="btn2">
                                <a class="btn-flat2" href="/">ホームへ</a>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="{{ asset('/js/create.js') }}"></script>
    </body>
    </x-app-layout>
</html>