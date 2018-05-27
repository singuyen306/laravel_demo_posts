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

Auth::routes();

/*
 * Group route without auth
 */
Route::group(['namespace' => 'Auth'], function (){
    Route::get('login', 'LoginController@showFormLogin')->name('frontend_login');
    Route::post('login', 'LoginController@postLogin')->name('frontend_login_submit');
    Route::get('register', 'RegisterController@showFormRegister')->name('frontend_register');
    Route::post('register', 'RegisterController@postRegister')->name('frontend_register_submit');
    Route::get('logout', 'LoginController@logout')->name('frontend_logout');
});
Route::get('/', 'PostsController@index')->name('frontend_home');
Route::get('/posts/has-exist-post', 'PostsController@hasExistPost')->name('frontend_has_exist_post');
Route::resource('posts', 'PostsController');
