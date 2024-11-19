<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Blog;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Blog $blog)
    {
        $posts = $blog->posts()->with('user')->get();
        return response()->json($posts);
    }

    public function store(PostRequest $request, Blog $blog)
    {
        $post = $blog->posts()->create($request->validated());
        return response()->json($post, 201);
    }

    public function show(Blog $blog, Post $post)
    {
        $post->load('user', 'likes', 'comments');
        return response()->json($post);
    }

    public function update(PostRequest $request, Blog $blog, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }

    public function destroy(Blog $blog, Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully!']);
    }

    public function like(Request $request, Post $post)
    {
        $post->likes()->create(['user_id' => $request->user_id]);
        return response()->json(['message' => 'Post liked successfully']);
    }

    public function comment(Request $request, Post $post)
    {
        $comment = $post->comments()->create([
            'content' => $request->content,
            'user_id' => $request->user_id
        ]);
        return response()->json($comment, 201);
    }
}
