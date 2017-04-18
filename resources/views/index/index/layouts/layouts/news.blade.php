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
