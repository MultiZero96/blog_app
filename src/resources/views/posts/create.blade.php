<h1>Create New Post</h1>

<form method="POST" action="/posts">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" required>
    <label>Content:</label>
    <textarea name="content" required></textarea>
    <button type="submit">Publish</button>
</form>
