<div class="service-tab apply" id="apply">
    <div class="main-section-list">
        @foreach($applies as $apply)
            <div class="main-section-list-block">
                <a href="{{ action('PostController@show', ['id' => $apply->id]) }}">
                    <div class="main-section-list-content">
                        <h1 class="main-section-list-title">{{ $apply->title }}</h1>
                        <div class="main-section-list-info">2017.02KB docx {{ $apply->created_at }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @include('index.index.layouts.layouts.server_more_button')
</div>
