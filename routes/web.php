<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes(['verify' => true]);

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware' => ['verified', 'auth', 'Role:10']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/send/email', 'HomeController@mail');
