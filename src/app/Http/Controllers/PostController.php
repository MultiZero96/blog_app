<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
    $posts = Post::with('user')->latest()->get();
    return view('posts.index', compact('posts'));
}

public function create() {
    return view('posts.create');
}

public function store(Request $request) {
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Post::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return redirect('/posts')->with('success', 'Post created!');
    }

    public function show($id) {
        $post = Post::with('comments.user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        abort_unless($post->user_id === auth()->id(), 403);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        abort_unless($post->user_id === auth()->id(), 403);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->only('title', 'content'));

        return redirect("/posts/{$id}")->with('success', 'Post updated!');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        abort_unless($post->user_id === auth()->id(), 403);
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted!');
    }

}
