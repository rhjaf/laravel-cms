<?php


use Illuminate\Support\Facades\Route;


Route::get('/post/{post}','PostController@show')->name('post');

Route::middleware(['auth'])->group(function (){
    Route::get('/posts','PostController@index')->name('post.index'); // fetch all posts
    Route::get('/posts/create','PostController@create')->name('post.create');
    Route::post('/posts','PostController@store')->name('post.store');
    Route::patch('/posts/{post}/update','PostController@update')->name('post.update');
    Route::delete('/posts/{post}/destroy','PostController@destroy')->name('post.destroy');
    Route::get('/posts/{post}/edit','PostController@edit')->middleware('can:view,post')->name('post.edit');

});
