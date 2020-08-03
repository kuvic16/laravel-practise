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
    // $user = App\User::first();
    // $post = $user->posts()->create([
    //     'title' => 'foobar',
    //     'body'  => 'lorem ipsum'
    // ]);
    // $post->tags()->attach(2);

    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});



Route::get('/post/{post}', "PostController@show");
