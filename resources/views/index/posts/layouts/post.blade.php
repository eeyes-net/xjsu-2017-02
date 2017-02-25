<div class="title">
    <p>{{ $post->title }}</p>
    <div class="author" >
        <img src="../img/author_1.png">
        <p class="gray">{{ $post->getMeta('place') }}</p>
        <img src="../img/author_2.png">
        <p class="gray">{{ date('Y-m-d H:i', strtotime($post->getMeta('time'))) }}</p>
    </div>
</div>
<div class="clearfix">
    <div class="content">
        {!! $post->body !!}
    </div>
</div>
