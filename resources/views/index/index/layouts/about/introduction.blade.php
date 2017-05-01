<div class="about-block xjsu-introduce">
    <h1 class="about-title"><span>学生会简介</span></h1>
    <div class="about-xjsu-introduce-body">
        <p class="about-xjsu-introduce-text">{{ $xjsu_introduction }}</p>
        <div class="about-xjsu-introduce-more"><a href="{{ action('PostController@show', ['id' => $xjsu_introduction_more]) }}">MORE&gt;&gt;</a></div>
    </div>
</div>
