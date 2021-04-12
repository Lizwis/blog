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

        if (request()->image) {
            $image = $this->imageResize(request()->image);
            $array_image = ['image' => 'postsImages/' . $image];
        }
        auth()->user()->posts()->create(array_merge(
            $data,
            $array_image ?? []
        ));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    public function update($post)
    {
        $data = $this->validateData();

        if (request()->image) {
            $image = $this->imageResize(request()->image);
            $array_image = ['image' => 'postsImages/' . $image];
        }

        Post::where('id', $post)->update(array_merge(
            $data,
            $array_image ?? []
        ));
        return redirect()->back();
    }

    public function delete(Post $id)
    {
        $id->delete();
        return redirect()->back();
    }

    private function validateData()
    {
        return request()->validate(['title' => 'required', 'post' => 'required', 'image' => '']);
    }

    private function imageResize($imagePath)
    {
        $imageResized = Image::make($imagePath)->resize(500, 400);

        $imageName = time() . '.' . $imagePath->extension();

        $imageResized->save('postsImages/' . $imageName, 80);

        return $imageName;
    }

    public function user_posts()
    {
        $posts = Auth()->user()->posts()->latest()->paginate(3);
        $postFilter = 2;
        return view('posts.index', compact('posts', 'postFilter'));
    }
}
