<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('index', compact('posts'));
    }
    public function show(Post $post)
    {
    }

    public function create()
    {
    }

    public function edit()
    {
    }
    public function update()
    {
    }

    public function destroy()
    {
    }
}
