<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Blog::latest()->paginate(10);
        return view('blogs.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        Blog::create([
            'title' => $request->title,
            'text' => $request->text,
            'author_id' => Auth::user()->id,
        ]);
        return redirect()->route('blogs.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function showBlog(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePostRequest $request, Blog $blog)
    {
        $blog->update($request->all());
        return redirect()->route('blogs.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Post deleted successfully');
    }
}
