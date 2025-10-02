<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<small>By {{ $post->user->name }}</small>

<h3>Comments</h3>
@foreach ($post->comments as $comment)
    <div>
        <p>{{ $comment->comment }}</p>
        <small>
            @if ($comment->user)
                By {{ $comment->user->name }}
            @else
                By Guest
            @endif
        </small>
        @auth
            @if (auth()->id() === $comment->user_id || auth()->id() === $post->user_id)
                <form method="POST" action="/comments/{{ $comment->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Comment</button>
                </form>
            @endif
        @endauth
    </div>
@endforeach
<form method="POST" action="/posts/{{ $post->id }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Post</button>
</form>

<h3>Leave a Comment</h3>
<form method="POST" action="/posts/{{ $post->id }}/comments">
    @csrf
    <textarea name="comment" required></textarea>
    <button type="submit">Submit</button>
</form>

