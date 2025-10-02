<h1>All Posts</h1>

@foreach ($posts as $post)
    <div>
        <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
        <p>{{ $post->content }}</p>
        <small>By {{ $post->user->name }}</small>
    </div>
@endforeach

<a href="/posts/create">Create New Post</a>
