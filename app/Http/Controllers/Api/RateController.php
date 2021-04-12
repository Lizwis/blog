<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class RateController extends Controller
{
    public function show($id)
    {
        $rating = Post::select('rating')->where('id', $id)->first();

        return request()->json('200', $rating);
    }

    public function store($post, $rating)
    {
        Post::where('id', $post)->update([
            'rating' => $rating
        ]);

        return request()->json('200', $rating);
    }
}
