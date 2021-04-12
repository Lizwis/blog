<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        $filter = request()->filter;

        if ($filter == 2) {
            return redirect('/post/user_posts');
        } else {
            return redirect('/');
        }
    }
}
