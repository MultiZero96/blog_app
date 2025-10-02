<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id) {
    $request->validate([
        'comment' => 'required|string',
    ]);

    \App\Models\Comment::create([
        'post_id' => $id,
        'user_id' => auth()->id(),
        'comment' => $request->comment,
    ]);

    return redirect("/posts/{$id}")->with('success', 'Comment added!');
    }

    public function destroy($id) {
    $comment = \App\Models\Comment::findOrFail($id);
    $isOwner = auth()->id() === $comment->user_id;
    $isPostOwner = auth()->id() === $comment->post->user_id;

    abort_unless($isOwner || $isPostOwner, 403);

    $comment->delete();
    return back()->with('success', 'Comment deleted!');
    }


}
