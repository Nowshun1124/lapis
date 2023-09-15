<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アーティストに寄付する</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/donation.css') }}">
        <script src="https://kit.fontawesome.com/401b404339.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <x-slot name="header">
        　  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation') }}
        　  </h2>
        </x-slot>
        <body>
            <div class="homebody">
                <p>Donation</p>
                <p>ユーザーを選択してください</p>
                <form method="POST" action="/donatios/done">
                    @csrf
                    @foreach(Auth::user()->follows as $user)
                        <p>{{ $user->name }}: <input type="checkbox" name="user_to_id" value="{{ $user->id }}"></p>
                    @endforeach
                    <input type="number" name="money" value="money" placeholder="¥ 金額を記入">
                    <div class="messagearea">
                        <textarea name="message" placeholder="応援メッセージを記入"></textarea>
                    </div>
                    <input type="submit" value="寄付する"/>
                </form>
            </div>
        </body>
    </x-app-layout>
</html>