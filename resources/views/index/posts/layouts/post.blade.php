<div class="post-container">
    <div class="post-title-container">
        <h1 class="post-title">{{ $post->title }}</h1>
        <div class="post-title-info-container">
            <div class="post-title-info author"><span class="post-title-info-text">{{ $post->getMeta('author') }}</span></div>
            <div class="post-title-info time"><span class="post-title-info-text">{{ date('Y-m-d H:i', strtotime($post->getMeta('time'))) }}</span></div>
            <div class="post-title-info visit-count"><span class="post-title-info-text">{{ $post->getMeta('visit_count') }}</span></div>
        </div>
    </div>
    <div class="post-body-container">
        <div class="post-body">
            {!! $post->body !!}
        </div>
        <div style="clear: both;"></div>
    </div>
</div>
