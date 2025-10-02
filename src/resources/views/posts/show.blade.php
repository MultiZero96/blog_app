<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<small>By {{ $post->user->name }}</small>

<h3>Comments</h3>
@foreach ($post->comments as $comment)
    <div>
        <p>{{ $comment->comment }}</p>
        <small>— {{ $comment->user->name }}</small>
    </div>
@endforeach
<form method="POST" action="/posts/{{ $post->id }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
