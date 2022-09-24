<h3>
        {{ $comment->title }}
</h3>
Posted: <x-timestamp :timestamp="$comment->created_at"></x-timestamp> by
<a href="{{ route('api.users.show', ['user' => $comment->user]) }}">
    {{ $comment->user->name }}
</a>


<p>{{ $comment->content }}</p>

