<div class="about-block minister">
    <h1 class="about-title"><span>部门介绍</span></h1>
    <div class="about-minister-body">
        <ul class="about-minister-body-list">
            @foreach($ministers as $minister)
                <li class="about-minister-body-li">
                    <a href="{{ action('PostController@show', ['id' => $minister['id']]) }}">
                        <div class="about-minister-card">
                            <img class="about-minister-image" src="{{ \App\Post::find($minister['id'])->getMeta('picture') }}" alt="部门图片">
                            <h1 class="about-minister-name">{{ $minister['name'] }}</h1>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        {{--
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
        --}}
    </div>
</div>
