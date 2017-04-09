<section class="main-section activity" id="activity">
    <div class="main-section-title-container right">
        <div class="main-section-title">
            <div class="main-section-title-number">NO.4</div>
            <h1 class="main-section-title-text">品牌活动</h1>
        </div>
    </div>
    <div class="main-section-body-photo-card">
        <div class="main-section-photo-card-container">
            @foreach($activities as $activity)
                <div class="main-section-photo-card-block">
                    <a href="{{ action('PostController@show', ['id' => $activity->id]) }}">
                        <div class="main-section-photo-card-image-container">
                            <img class="main-section-photo-card-image" src="{{ $activity->getMeta('picture') }}" alt="品牌活动标题图">
                        </div>
                        <div class="main-section-photo-card-detail">
                            <h1 class="main-section-photo-card-title">{{ $activity->title }}</h1>
                            <div class="main-section-photo-card-info-container">
                                <div class="main-section-photo-card-info place"><span class="main-section-photo-card-info-text">{{ $activity->getMeta('place') }}</span></div>
                                <div class="main-section-photo-card-info time"><span class="main-section-photo-card-info-text">{{ $activity->created_at }}</span></div>
                            </div>
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
