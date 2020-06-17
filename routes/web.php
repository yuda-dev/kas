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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('dashboard','DashboardController@index');

    //kas mesjid mausk
    Route::get('kas_mesjid_masuk','KasmesjidmasukController@index');
    Route::get('kas_mesjid_masuk/add','KasmesjidmasukController@add');
    Route::post('kas_mesjid_masuk/add','KasmesjidmasukController@store');
    Route::get('kas_mesjid_masuk/edit/{id}','KasmesjidmasukController@edit');
    Route::put('kas_mesjid_masuk/{id}','KasmesjidmasukController@update');
    Route::delete('kas_mesjid_masuk/delete/{id}','KasmesjidmasukController@delete');


     //kas mesjid keluar
     Route::get('kas_mesjid_keluar','KasmesjidkeluarController@index');
     Route::get('kas_mesjid_keluar/add','KasmesjidkeluarController@add');
     Route::post('kas_mesjid_keluar/add','KasmesjidkeluarController@store');
     Route::get('kas_mesjid_keluar/edit/{id}','KasmesjidkeluarController@edit');
     Route::put('kas_mesjid_keluar/{id}','KasmesjidkeluarController@update');
     Route::delete('kas_mesjid_keluar/delete/{id}','KasmesjidkeluarController@delete');

     //Rekap kas mesjid
     Route::get('rekap_km','RekapkmController@index');
     Route::get('rekap_km/filter','RekapkmController@filter');
     Route::get('rekap_km/export','RekapkmController@export');



    //kas sosial masuk
    Route::get('kas_sosial_masuk','KassosialmasukController@index');
    Route::get('kas_sosial_masuk/add','KassosialmasukController@add');
    Route::post('kas_sosial_masuk/add','KassosialmasukController@store');
    Route::get('kas_sosial_masuk/edit/{id}','KassosialmasukController@edit');
    Route::put('kas_sosial_masuk/{id}','KassosialmasukController@update');
    Route::delete('kas_sosial_masuk/delete/{id}','KassosialmasukController@delete');

    //kas sosial keluar
    Route::get('kas_sosial_keluar','KassosialkeluarController@index');
    Route::get('kas_sosial_keluar/add','KassosialkeluarController@add');
    Route::post('kas_sosial_keluar/add','KassosialkeluarController@store');
    Route::get('kas_sosial_keluar/edit/{id}','KassosialkeluarController@edit');
    Route::put('kas_sosial_keluar/{id}','KassosialkeluarController@update');
    Route::delete('kas_sosial_keluar/delete/{id}','KassosialkeluarController@delete');

     //Rekap kas sosial
     Route::get('rekap_ks','RekapksController@index');
     Route::get('rekap_ks/filter','RekapksController@filter');
     Route::get('rekap_ks/export','RekapksController@export');


     //Pengguna
     Route::get('pengguna','PenggunaController@index');
     Route::put('pengguna/update_profile','PenggunaController@update');
     Route::put('pengguna/update_password','PenggunaController@updatepassword');
     
});

Route::get('/home', function () {
    return redirect('dashboard');
});

Route::get('/keluar', function () {
    \Auth::logout();
    return redirect('login');
});