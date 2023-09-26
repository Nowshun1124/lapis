<link rel="stylesheet" href="{{ asset('/css/sidebar.css') }}">

<input type="checkbox" id="check">
<label for="check">
    <i class="fa-solid fa-bars" id="ham"></i>
    <i class="fa-solid fa-xmark" id="xmark"></i>
</label>
<div class="sidebar">
    <header>
        MENU
    </header>
        <div class="list">
            <ul>
                <li>
                    <a href="/"><i class="fa-solid fa-house fa-lg"></i>　ホーム</a>
                    <li>
                        <a href="/posts/create"><i class="fa-solid fa-square-plus fa-lg"></i>　作成</a>
                    </li>
                    <li>
                        <a href='/donations'><i class="fa-solid fa-circle-dollar-to-slot fa-lg"></i>　寄付</a>
                    </li>
                    <li>
                        <a href="/profile/edit"><i class="fa-solid fa-user fa-lg"></i>　プロフィール</a>
                    </li>
                    @if (Auth::user()->account_type === 1)
                    <li>
                        <a href="/mu/upload"><i class="fa-solid fa-compact-disc fa-lg"></i>　楽曲を投稿する</a>
                    </li>
                    @endif
                    <li>
                        <a href="/profile/edit"><i class="fa-solid fa-newspaper fa-lg"></i>　お知らせ</a>
                    </li>
                    <li>
                </li>    
            </ul>
        </div>
</div>