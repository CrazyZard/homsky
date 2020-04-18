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

Auth::routes();


Route::get('manage/login', 'Manage\LoginController@showLoginForm')->name('manage.login');
Route::post('manage/login', 'Manage\LoginController@login')->name('manage.login');
Route::post('manage/logout', 'Manage\LoginController@logout')->name('manage.logout');

//后台首页默认路由
Route::get('manage/', function(){
    if(!auth('admin')->user()){
        return redirect()->route('manage.login');
    }else{
        return redirect()->route('manage.home.index');
    }
})->name('manage.home.index');

Route::group([ 'middleware'=>['auth.admin','permission'],'prefix' => 'manage', 'as' => 'manage.','namespace' => 'Manage'], function () {

    Route::get('index', 'IndexController@index')->name('home.index');
    Route::get('env', 'IndexController@env')->name('home.env');
    Route::resource('admin', 'AdminController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
