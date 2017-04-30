<div class="carousel">
    <div class="carousel-image-container">
        <ul class="carousel-image-ul">
            @foreach($carousels as $carousel)
                <li class="carousel-image-li">
                    <img class="carousel-image" src="{{ $carousel['image'] }}" alt="展示图">
                    <a style="opacity: 0;" class="carousel-image-button" href="{{ action('PostController@show', ['id' => $carousel['id']]) }}" target="_blank">了解更多</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="carousel-shift-button-container">
        <div class="carousel-shift-button-group">
            <button class="carousel-shift-button pre">&lt;</button>
            <button class="carousel-shift-button next">&gt;</button>
        </div>
    </div>
    <div class="carousel-ordered-button-group">
        <ol class="carousel-ordered-button-ol">
            <?php $i = 0;?>
            @foreach($carousels as $carousel)
                <li class="carousel-ordered-button-li">
                    <button class="carousel-ordered-button @if ($i === 0) active @endif" data-index="{{ $i }}">{{ $i + 1 }}</button>
                </li>
                <?php ++$i;?>
            @endforeach
        </ol>
    </div>
</div>
