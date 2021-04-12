<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Intervention\Image\ImageManagerStatic as Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show',
        ]]);
    }


    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(3);
        $postFilter = 1;
        return view('posts.index', compact('posts', 'postFilter'));
    }
    public function show($post_id)
    {
        $post = Post::where('id', $post_id)->with('user')->first();
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $data = $this->validateData();

        $imagePath = $data['image'];
        $imageResized = Image::make($imagePath)->resize(500, 400);


        $imageName = time() . '.' . $data['image']->extension();


        $imageResized->save('postsImages/' . $imageName, 80);

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'post' => $data['post'],
            'image' => 'postsImages/' . $imageName
        ]);
    }

    public function edit()
    {
    }
    public function update()
    {
    }

    public function delete(Post $id)
    {
        $id->delete();
        return redirect()->back();
    }

    private function validateData()
    {
        return request()->validate(['title' => 'required', 'post' => 'required', 'image' => ['required', 'image']]);
    }

    public function user_posts()
    {
        $posts = Auth()->user()->posts()->latest()->paginate(3);
        $postFilter = 2;
        return view('posts.index', compact('posts', 'postFilter'));
    }
}
