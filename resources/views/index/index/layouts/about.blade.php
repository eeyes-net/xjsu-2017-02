<section class="main-section about" id="about">
    <div class="main-section-title-container left">
        <div class="main-section-title">
            <div class="main-section-title-number">NO.3</div>
            <h1 class="main-section-title-text">组织介绍</h1>
        </div>
        <div class="about-member-count">
            <div class="about-member-count-rect"></div>
            <div class="about-member-count-content">
                从1919年到{{ \Carbon\Carbon::now()->year }}年总计<span class="about-member-count-number">{{ \App\Option::getOption('member_count', '191954') }}</span>成员
            </div>
        </div>
    </div>
    @include('index.index.layouts.about.introduction')
    @include('index.index.layouts.about.presidium')
    @include('index.index.layouts.about.minister')
</section>
