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
Route::get('/map', function () {
    return view('map');
});
//https://weathervision.app/api/v1/uid=(UID here),(lat),(lon)
Route::get('/api/v1', 'ApiController@getReports');
Route::get('/api/test', 'ApiController@test');
