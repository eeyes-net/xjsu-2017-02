<section class="main-section news" id="news">
    <div class="main-section-title-container left">
        <div class="main-section-title">
            <div class="main-section-title-number">NO.1</div>
            <h1 class="main-section-title-text">新闻公告</h1>
        </div>
    </div>
    <div class="news-section-body">
        <div class="news-container main-section-list">
            @foreach($news as $news1)
                <div class="main-section-list-block">
                    <a href="{{ action('PostController@show', ['id' => $news1->id]) }}">
                        <div class="main-section-list-content">
                            <h1 class="main-section-list-title">{{ $news1->title }}</h1>
                            <div class="main-section-list-info">{{ $news1->created_at }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="main-section-button-group">
        <div class="main-section-shift-button-container">
            <button class="main-section-shift-button"><img class="main-section-shift-button-image" src="/assets/index/images/list-page-pre.png" alt="上一页"></button>
        </div>
        <div class="main-section-ordered-button-container">
            <ol class="main-section-ordered-button-ol">
                <li class="main-section-ordered-button-li">
                    <button class="main-section-ordered-button">1</button>
                </li>
                <li class="main-section-ordered-button-li">
                    <button class="main-section-ordered-button active">2</button>
                </li>
                <li class="main-section-ordered-button-li">
                    <button class="main-section-ordered-button">3</button>
                </li>
            </ol>
        </div>
        <div class="main-section-shift-button-container">
            <button class="main-section-shift-button"><img class="main-section-shift-button-image" src="/assets/index/images/list-page-next.png" alt="上一页"></button>
        </div>
    </div>
</section>
