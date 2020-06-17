<?php

use Illuminate\Support\Facades\Route;

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

/*
    Route::get('/', 'HomeController@index')->name('welcome');
    Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function ()
    {
        Route::get('dashboard','DashboardController@index')->name('dashboard');

        //category
        Route::get('category','CategoryController@index');
        Route::get('category/add','CategoryController@add');
        Route::post('category/add','CategoryController@store');
        Route::get('category/{id}','CategoryController@edit');
        Route::put('category/{id}','CategoryController@update');
        Route::delete('category/{id}','CategoryController@delete');

    });

    Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function ()
    {
        Route::get('dashboard','DashboardController@index')->name('dashboard');

    });
*/

Route::get('/', 'ujiController@index');

Route::get('demo','DemoController@index');
Route::get('demo/add','DemoController@add');
Route::post('demo/add','DemoController@store');
Route::get('demo/{id}','DemoController@edit');
Route::delete('demo/{id}','DemoController@delete');


Route::get('keluar',function (){
    \Auth::logout();
    return redirect('login');
});
