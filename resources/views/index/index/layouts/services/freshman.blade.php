<div class="service-tab freshman" id="freshman">
    <div class="main-section-list">
        @foreach($freshmen as $freshman)
            <div class="main-section-list-block">
                <a href="{{ action('PostController@show', ['id' => $freshman->id]) }}">
                    <div class="main-section-list-content">
                        <h1 class="service-tab-freshman-list-title"><span>{{ $freshman->title }}</span></h1>
                        <div class="service-tab-freshman-list-info">{{ mb_substr(html_to_text($freshman->body), 0, 30) }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @include('index.index.layouts.layouts.server_more_button')
</div>
