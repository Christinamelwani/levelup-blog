<h1>
    <a {{ $attributes->merge(['class' => '']) }}>
        {{ $article->title }}
    </a>
</h1>

Posted: <x-timestamp :timestamp="$article->created_at"></x-timestamp>

<p>{{ $article->content }}</p>

{{ $slot }}
