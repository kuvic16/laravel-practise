<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if (!$post) {
            abort(404, 'Sorry, that post was not found.');
        }

        return view('post', [
            'post' => $post
        ]);
    }
}
