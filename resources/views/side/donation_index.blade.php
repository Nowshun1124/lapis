<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>寄付する</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/donation.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
            <div class="donation_header">
                <h1>寄付する</h1>
            </div>
            <div class="donation">
                <div class="donation_body">
                    <form method="POST" action="/donatios/done">
                    @csrf
                        <div class="userselect">
                            <p>ユーザーを選択してください</p>
                            <select id="select1" class="select" name="user_to_id">
                               @foreach(Auth::user()->follows as $user)
                                   <option value="{{ $user->id }}">{{ $user->name }}</option>
                               @endforeach
                           </select>
                           <div class="artist_icon">
                               <img id="photo">
                           </div>
                        </div>
                        <div class="money">
                            <p>金額を記入</p>
                            <div class="moneyinput">
                                <input id="text1" type="number" name="money" value="money" placeholder="¥ 金額を記入">
                            </div>
                        </div>
                        <div class="message">
                            <p>メッセージ</p>
                            <div class="messagearea">
                                <textarea id="text2" name="message" placeholder="応援メッセージを記入" cols="100" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="btn">
                            <a class="btn-flat"><input type="submit" value="寄付する"/></a>
                        </div>
                </form>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>