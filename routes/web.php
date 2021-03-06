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

use App\Post;

Route::get('/', function() {
    return view('test', ['posts' => Post::all()]);
});

Route::post('/sync/posts', 'ContentfulController@syncPosts');
