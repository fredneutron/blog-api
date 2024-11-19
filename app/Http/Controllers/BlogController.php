<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')->get();
        return response()->json($blogs);
    }

    public function store(BlogRequest $request)
    {
        $blog = Blog::create($request->validated());
        return response()->json($blog, 201);
    }

    public function show(Blog $blog)
    {
        $blog->load('user', 'posts');
        return response()->json($blog);
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());
        return response()->json($blog);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(['message' => 'Blog deleted successfully!']);
    }
}
