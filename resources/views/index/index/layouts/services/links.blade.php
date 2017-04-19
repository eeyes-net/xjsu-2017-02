<div class="service-tab link active" id="link">
    <div class="service-tab-link-container">
        @foreach($links as $link)
            <div class="service-tab-link">
                <a href="{{ $link['url'] }}" target="_blank">
                    <div class="service-tab-link-content">
                        <h1 class="service-tab-link-text">{{ $link['name'] }}</h1>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
