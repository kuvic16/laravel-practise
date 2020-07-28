<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show($slug)
    {
        // $posts = [
        //     'my-first-post'   => 'Hello, this is my first blog post!',
        //     'my-second-post' => 'Now, I am getting the hang of this blogging thing.'
        // ];

        // if (!array_key_exists($post, $posts)) {
        //     abort(404, 'Sorry, that post was not found.');
        // }

        $post = DB::table('posts')->where('slug', $slug)->first();

        return view('post', [
            'post' => $post
        ]);
    }
}
