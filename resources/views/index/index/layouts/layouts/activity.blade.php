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
