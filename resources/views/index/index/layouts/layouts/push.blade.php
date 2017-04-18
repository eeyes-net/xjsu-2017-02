@foreach($pushes as $push)
    <div class="main-section-photo-card-block">
        <a href="{{ action('PostController@show', ['id' => $push->id]) }}">
            <div class="main-section-photo-card-image-container">
                <img class="main-section-photo-card-image" src="{{ $push->getMeta('picture') }}" alt="精品推送标题图">
            </div>
            <div class="main-section-photo-card-detail">
                <h1 class="main-section-photo-card-title">{{ $push->title }}</h1>
                <div class="main-section-photo-card-info-container">
                    <div class="main-section-photo-card-info time"><span class="main-section-photo-card-info-text">{{ $push->created_at }}</span></div>
                    <div class="main-section-photo-card-info visit-count"><span class="main-section-photo-card-info-text">{{ $push->getMeta('visit_count') }}</span></div>
                </div>
            </div>
        </a>
    </div>
@endforeach
