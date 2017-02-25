<ul>
    @foreach ($tags as $tag)
        <li>
            <input type="checkbox" name="tags[{{ $tag->id }}]" @if (in_array($tag['name'], $post_tags)) checked @endif value="1">{{ $tag->slug }}
        </li>
    @endforeach
</ul>
