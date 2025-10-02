<h1>Edit Post</h1>

<form method="POST" action="/posts/{{ $post->id }}">
    @csrf
    @method('PUT')
    <label>Title:</label>
    <input type="text" name="title" value="{{ $post->title }}" required>
    <label>Content:</label>
    <textarea name="content" required>{{ $post->content }}</textarea>
    <button type="submit">Update</button>
</form>
