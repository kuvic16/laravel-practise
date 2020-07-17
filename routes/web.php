<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $user = App\User::first();

    $post = $user->posts()->create([
        'title' => 'foobar',
        'body'  => 'lorem ipsum'
    ]);

    $post->tags()->attach(2);

    return view('home');

    // return [
    //     'Project' => 'Tornado Vision API',
    //     'version' => '1.0'
    // ];
});

Route::get('/post/{post}', function ($post) {
    $posts = [
        'my-first-post'   => 'Hello, this is my first blog post!',
        'my-second-post' => 'Now, I am getting the hang of this blogging thing.'
    ];

    if (!array_key_exists($post, $posts)) {
        abort(404, 'Sorry, that post was not found.');
    }

    return view('post', [
        'post' => $posts[$post]
    ]);
});
