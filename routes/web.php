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


Route::get('/', 'FrontController@index');

Route::prefix('testimonial')->group(function () {
    Route::get('/', 'FrontController@testimonial');
    Route::post('/store', 'FrontController@storetestimonial');
});

Route::get('/dashboard', function () {
    return view('backend.konten.dashboard');
});

Route::prefix('pelanggan')->group(function () {
    Route::get('/', 'BackController@pelanggan');
    Route::get('/tambah', 'BackController@tambahpelanggan');
    Route::get('/edit/{id}', 'BackController@editpelanggan');
    Route::put('/update/{id}', 'BackController@updatepelanggan');
    Route::get('/delete/{id}', 'BackController@deletepelanggan');
});

Route::prefix('kategori')->group(function () {
    Route::get('/', 'BackController@kategori');
    Route::get('/tambah', 'BackController@tambahkategori');
    Route::post('/store', 'BackController@storekategori');
    Route::get('/edit/{id}', 'BackController@editkategori');
    Route::put('/update/{id}', 'BackController@updatekategori');
    Route::get('/delete/{id}', 'BackController@deletekategori');
});
