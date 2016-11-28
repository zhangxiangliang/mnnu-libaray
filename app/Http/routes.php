<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
 * 图书模块路由
 */
Route::get('/', 'BookController@library');
Route::get('book/{id}',['as' => 'show_book', 'uses' => 'BookController@show'])->where('id', '[0-9]+');
Route::get('book', 'BookController@index');

/*
 * 图书模块路由
 */
Route::post('search', 'SearchController@index');
Route::get('search', 'SearchController@index');

/*
 * 密码重置模块路由
 */
Route::controllers([
    'password' => 'Auth\PasswordController',
]);

/*
 * 登录模块路由
 */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
 * 用户模块路由
 */
Route::get('user/{id}', ['as' => 'info_user', 'uses' => 'UserController@show'])
        ->where('id', '[0-9]+');
Route::get('user', 'UserController@index');
Route::get('user/{id}/reading', 'UserController@reading');
Route::get('user/{id}/read', 'UserController@read');
Route::get('user/{id}/comment', 'UserController@comment');


Route::group(['middleware' => 'auth'], function() {
    // 用户模块路由
    Route::post('user/info/', 'UserController@updateInfo');
    Route::get('user/info/', 'UserController@info');

    // 头像上传路由
    Route::get('user/avatar', 'UserController@avatar');
    Route::post('user/avatar', 'UserController@avatarUpload');

    // 图书模块路由
    Route::get('book/{id}/comment', 'CommentController@create')->where('id', '[0-9]+');
    Route::post('book/{id}/comment', 'CommentController@store')->where('id', '[0-9]+');
    Route::get('book/{id}/borrow', 'BookController@borrow')->where('id', '[0-9]+');
    Route::get('book/{id}/back', 'BookController@back')->where('id', '[0-9]+');

});

Route::group(['middleware' => 'auth', 'middleware' => 'role:admin|teacher', 'prefix' => 'back'], function() {
    Route::get('/', 'BackController@index');
    Route::get('/book', 'BackController@book');
    Route::get('/book/create', 'BookController@create');
    Route::post('/book/create', 'BookController@store');
    Route::delete('/book/delete/{id}', 'BookController@destroy');
    Route::get('/book/edit/{id}', 'BookController@edit');
    Route::patch('/book/edit/{id}', 'BookController@update');

    Route::get('/user', 'BackController@user');
    Route::get('/teacher', 'BackController@teacher');
    Route::get('/admin', 'BackController@admin');
    Route::delete('/user/delete/{id}', 'UserController@destroy');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::patch('/user/edit/{id}', 'UserController@update');
    Route::get('/user/forbin/{id}', 'UserController@forbin');
    Route::get('/user/allow/{id}', 'UserController@allow');

    Route::get('/comment', 'BackController@comment');
    Route::delete('/comment/delete/{id}', 'CommentController@destroy');
    Route::get('/forbin', 'BackController@forbin');

    Route::get('/info', 'BackController@infomation');
});
