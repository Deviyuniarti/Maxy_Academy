<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'post_id' => $postId,
            'content' => $request->content,
        ]);

        return redirect()->route('blog.show', $postId);
    }
}
