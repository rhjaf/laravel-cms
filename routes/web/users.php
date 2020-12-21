<?php


use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/update','UserController@update')->name('user.profile.update');
Route::delete('/users/{user}/destroy','UserController@destroy')->name('users.destroy');


Route::middleware(['role:Admin','auth'])->group(function(){
//    role is the name of registered middleware inside /Http/Kernel.php
//    we can also add another parameter for role:Admin like this : role:Admin,view-dahsboard
    Route::get('/users','UserController@index')->name('users.index');
    Route::put('/users/{user}/attach','UserController@attach')->name('users.role.attach'); // attaching a role to a user
    Route::put('/users/{user}/detach','UserController@detach')->name('users.role.detach'); // detaching a role from user

});

Route::middleware(['can:view,user'])->group(function (){
    // we passed a policy. 'can' is keyword
    Route::get('/users/{user}/profile','UserController@show')->name('user.profile.show');

});
