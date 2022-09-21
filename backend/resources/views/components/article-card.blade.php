    <div {{ $attributes->merge(['class' => '']) }}>
    <h1>
        <a {{ $attributes->merge(['class' => '']) }}>
            {{ $article->title }}
        </a>
    </h1>

    Posted: <x-timestamp :timestamp="$article->created_at"></x-timestamp>

    @if($type == "index")
          <p>{{$article -> summary}}</p>
    @else
          <p>{{$article -> content}}</p>
    @endif
    {{ $slot }}

    </div>
