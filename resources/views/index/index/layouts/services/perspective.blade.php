<div class="service-tab perspective" id="perspective">
    <div class="main-section-list">
        @foreach($perspectives as $perspective)
            <div class="main-section-list-block">
                <a href="{{ action('PostController@show', ['id' => $perspective->id]) }}">
                    <div class="main-section-list-content">
                        <h1 class="main-section-list-title">{{ $perspective->title }}</h1>
                        <div class="main-section-list-info">{{ $perspective->created_at }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @include('index.index.layouts.layouts.server_more_button')
</div>
