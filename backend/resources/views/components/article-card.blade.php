<h1>
    <a {{ $attributes->merge(['class' => '']) }}>
        {{ $article->title }}
    </a>
</h1>

Posted: <x-timestamp :timestamp="$article->created_at"></x-timestamp> by
<a href="{{ route('api.users.show', ['user' => $article->author]) }}">
    {{ $article->author->name }}
</a>

<p>{{ $article->content }}</p>

{{ $slot }}
