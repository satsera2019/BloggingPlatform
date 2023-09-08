<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function addComment(CreateCommentRequest $request, Blog $blog)
    {
        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'blog_id' => $blog->id,
        ]);
        return redirect()->route('blogs.show', $blog)->with('success', 'Comment created successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
