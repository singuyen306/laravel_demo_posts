<?php

Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function (){
    Route::get('login', 'UsersController@login')->name('backend_login');
    Route::post('login', 'UsersController@postLogin')->name('backend_login_submit');
    Route::get('logout', 'UsersController@logout')->name('backend_logout');

    Route::group(['middleware' => ['admin']], function (){
        Route::get('', 'DashBoardController@index')->name('backend_home');
        Route::get('/approved', 'DashBoardController@approved')->name('backend_post_approved');
    });
});

