<section class="main-section service" id="service">
    <div class="main-section-title-container left">
        <div class="main-section-title">
            <div class="main-section-title-number">NO.5</div>
            <h1 class="main-section-title-text">校园服务</h1>
        </div>
    </div>
    <div class="service-section-body">
        <div class="service-container">
            <div class="service-tab-title-container">
                <ul class="service-tab-title-ul">
                    <li class="service-tab-title-li">
                        <h1 class="service-tab-title-text" data-href="#apply">审批资料下载</h1>
                    </li>
                    <li class="service-tab-title-li">
                        <h1 class="service-tab-title-text" data-href="#perspective">微视角</h1>
                    </li>
                    <li class="service-tab-title-li active">
                        <h1 class="service-tab-title-text" data-href="#link">校园网址速达</h1>
                    </li>
                    <li class="service-tab-title-li">
                        <h1 class="service-tab-title-text" data-href="#freshman">新生手册</h1>
                    </li>
                </ul>
            </div>
            <div class="service-tab-container">
                @include('index.index.layouts.services.apply')
                @include('index.index.layouts.services.perspective')
                @include('index.index.layouts.services.links')
                @include('index.index.layouts.services.freshman')
            </div>
        </div>
    </div>
</section>
