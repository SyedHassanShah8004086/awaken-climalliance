<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
    ]);

    $imagePath = null;
    if ($request->hasFile('featured_image')) {
        $file = $request->file('featured_image');
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $destinationPath = public_path('blog-images');
        
        // Create directory if not exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        
        $file->move($destinationPath, $filename);
        $imagePath = 'blog-images/' . $filename;
    }

    Post::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'excerpt' => $request->excerpt,
        'content' => $request->content,
        'featured_image' => $imagePath,
        'category' => $request->category,
        'author' => auth()->user()->name,
        'status' => $request->status,
        'published_at' => $request->status == 'published' ? now() : null,
    ]);

    return redirect()->route('posts.index')->with('success', 'Post created successfully!');
}

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
    ]);

    $data = [
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'excerpt' => $request->excerpt,
        'content' => $request->content,
        'category' => $request->category,
        'status' => $request->status,
        'published_at' => $request->status == 'published' ? now() : $post->published_at,
    ];

    // Handle image upload for UPDATE
    if ($request->hasFile('featured_image')) {
        // Delete old image if exists
        if ($post->featured_image && file_exists(public_path($post->featured_image))) {
            unlink(public_path($post->featured_image));
        }
        
        $file = $request->file('featured_image');
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $destinationPath = public_path('blog-images');
        
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        
        $file->move($destinationPath, $filename);
        $data['featured_image'] = 'blog-images/' . $filename;
    }

    $post->update($data);

    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
}
    public function destroy(Post $post)
    {
        // Delete featured image
        if ($post->featured_image && file_exists(public_path($post->featured_image))) {
            unlink(public_path($post->featured_image));
        }
        
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}