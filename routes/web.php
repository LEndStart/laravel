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
    return view('welcome');
});


Route::any('problem',['uses'=>'CtfController@problem']);

Route::any('problem/flag/{id}',['uses'=>'CtfController@flag']);

Route::any('list',['uses'=>'CtfController@ctfList']);

Route::any('insert',['uses'=>'CtfController@insert']);

Route::get('passage', ['uses'=>'CtfController@passage']);

Route::any('wp',['uses'=>'CtfController@wp']);

//Route::any('upload', ['uses'=>'CtfController@upload']);
//Route::any('upwp',['uses'=>'CtfController@upwp']);
//Route::any('fopenwp',['uses'=>'CtfController@fopenwp']);


Route::get('competition', function () {
    if(Auth::check() == false)
    {
        return redirect()->intended('/login');
    }
    else return view('others');
});
Route::get('tools', function () {
    if(Auth::check() == false)
    {
        return redirect()->intended('/login');
    }
    else return view('others');
});
Route::get('against', function () {
    if(Auth::check() == false)
    {
        return redirect()->intended('/login');
    }
    else return view('others');
});

Route::any('admin',['uses'=>'AdminController@admin']);

Route::any('admin/save',['uses'=>'AdminController@save']);
Route::any('admin/save2',['uses'=>'AdminController@save2']);

Route::any('fopenwp',['uses'=>'CtfController@fopenwp']);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', ['uses'=>'CtfController@problem']);
//重新登录
Route::post('/login',['uses'=>'AuthController@postLogin']);

Route::any('forum',['uses'=>'CtfController@forum']);

Route::any('forum/content/{title}',['uses'=>'CtfController@forum_content']);
Route::any('forum/view/{type}',['uses'=>'CtfController@forum_view']);
Route::any('forum/comment/{type}',['uses'=>'CtfController@forum_comment']);
Route::any('forum/save/{type}',['uses'=>'CtfController@forum_save']);

