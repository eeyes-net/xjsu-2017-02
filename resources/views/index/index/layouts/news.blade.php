<div class="news">
    <div class="main-title title-left">
        <p class="mt-number">NO.1</p>
        <p class="mt-word">新闻公告</p>
    </div>
    <section></section>
    <div class="news-title">
        <div class="news-padding"></div>
        @foreach($news as $i => $news1)
            @if(($i & 1) == 0)
                <div class="news-title-left">
                    <p class="nt-word">{{ $news1->title }}</p>
                    <p class="news-time">{{ $news1->created_at }}</p>
                </div>
            @else
                <div class="news-title-right">
                    <p class="nt-word">{{ $news1->title }}</p>
                    <p class="news-time">{{ $news1->created_at }}</p>
                </div>
                <section></section>
            @endif
        @endforeach
        <section></section>
        <div class="ti-padding"></div>
        <div class="content-index news-index">
            <div class="index ni-a1">
                <ul>
                    <li class="content-active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul>
            </div>
            <a href="#"><img src="{{ asset('img/箭头右.png') }}"></a>
        </div>
    </div>
    <section></section>
</div>
