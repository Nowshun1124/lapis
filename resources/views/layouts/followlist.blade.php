<link rel="stylesheet" href="{{ asset('/css/followlist.css') }}">
<div class="followlist">
    <header class="header">
       フォロー中
    </header>
        <div class="followlist">
                    @foreach(Auth::user()->follows as $user)
                    <a href="/profile/shows/{{ $user->id }}">
                        <p>{{ $user->name }}</p>
                    </a>
                    @endforeach
            <ul>
            
            </ul>
        </div>
</div>