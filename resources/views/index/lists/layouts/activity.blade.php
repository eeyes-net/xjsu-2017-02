@for($i = 0; $i < count($activities); $i += 3)
    <div class="list clearfix">
        @for($j = 0; $j < 3, $i + $j < count($activities); ++$j)
            @if($activity)
                @include('index.lists.layouts.activity_item')
            @endif
        @endfor
    </div>
@endfor
