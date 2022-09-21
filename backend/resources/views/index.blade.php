<x-layout>

    <x-slot:head>
        <style>
            .title {
                color: gray;
            }

            .first{
                background-color:rgb(200, 193, 193);
                font-size: large;
            }

            .first h1 a{
                font-size: 1em;
                color: green;
            };

        </style>
    </x-slot:head>

    @foreach ($articles as $article)
        <x-article-card
            :article="$article"
            href="{{ route('articles.show', ['article' => $article]) }}"
            class="{{$loop->first ? 'first' : 'title' }}"
            type="index">
        </x-article-card>
    @endforeach
    <button onclick="window.scrollTo(0,0)">
        Back to the top
    </button>
</x-layout>
