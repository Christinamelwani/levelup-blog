<x-layout>
    <x-article-card :article="$article"></x-article-card>

    @if (count($article->comment) > 0)
    <h2>
        Comments:
    </h2>
    @foreach ($article->comment as $comment)
        <x-comment-card :comment="$comment"></x-comment-card>
    @endforeach
    @endif
</x-layout>
