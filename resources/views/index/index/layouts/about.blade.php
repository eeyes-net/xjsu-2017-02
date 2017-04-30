<section class="main-section about" id="about">
    <div class="main-section-title-container left">
        <div class="main-section-title">
            <div class="main-section-title-number">NO.3</div>
            <h1 class="main-section-title-text">组织介绍</h1>
        </div>
        <div class="about-member-count">
            <div class="about-member-count-rect"></div>
            <div class="about-member-count-content">
                从1919年到2017年总计<span class="about-member-count-number">191954</span>成员
            </div>
        </div>
    </div>
    <div class="about-block xjsu-introduce">
        <h1 class="about-title"><span>学生会简介</span></h1>
        <div class="about-xjsu-introduce-body">
            <p class="about-xjsu-introduce-text">{{ $xjsu_introduction }}</p>
            <div class="about-xjsu-introduce-more"><a href="{{ action('PostController@show', ['id' => $xjsu_introduction_more]) }}">MORE&gt;&gt;</a></div>
        </div>
    </div>
    <div class="about-block presidium">
        <h1 class="about-title"><span>主席团风采</span></h1>
        <div class="about-presidium-body">
            <table class="about-presidium-table" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td class="about-presidium-td-left-button">
                            <button class="about-presidium-shift-button">
                                <img src="/assets/index/images/presidium-pre.png" alt="上一张">
                            </button>
                        </td>
                        <td class="about-presidium-td-left-image"></td>
                        <td class="about-presidium-td-center">
                            <div class="about-presidium-main">
                                <a href="{{ $presidium[0]['url'] }}" target="_blank">
                                    <div class="about-presidium-border">
                                        <div class="about-presidium-image-container">
                                            <img class="about-presidium-image" src="/assets/index/images/presidium-bg-center.png" alt="主席团照片">
                                        </div>
                                        <div class="about-presidium-text">
                                            <h1 class="about-presidium-title">{{ $presidium[0]['name'] }}</h1>
                                            <p class="about-presidium-info">{{ $presidium[0]['introduction'] }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td class="about-presidium-td-right-image"></td>
                        <td class="about-presidium-td-right-button">
                            <button class="about-presidium-shift-button">
                                <img src="/assets/index/images/presidium-next.png" alt=下一张">
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="about-block minister">
        <h1 class="about-title"><span>部门介绍</span></h1>
        <div class="about-minister-body">
            <table class="about-minister-table" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        @foreach($ministers as $minister)
                            <td>
                                <a href="{{ action('PostController@show', ['id' => $minister['id']]) }}">
                                    <div class="about-minister-card">
                                        <img class="about-minister-image" src="{{ \App\Post::find($minister['id'])->getMeta('picture') }}" alt="部门图片">
                                        <h1 class="about-minister-name">{{ $minister['name'] }}</h1>
                                    </div>
                                </a>
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <!-- TODO -->
        </div>
    </div>
</section>
