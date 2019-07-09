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

// Link Halaman Dashboard Admin
Route::get('/dashboard', function () {
    return view('backend.konten.dashboard');
});

// link Halaman Pelanggan Admin
Route::prefix('pelanggan')->group(function () {
    Route::get('/', 'BackController@pelanggan');
    Route::get('/tambah', 'BackController@tambahpelanggan');
    Route::post('/store', 'BackController@storepelanggan');
    Route::get('/edit/{id}', 'BackController@editpelanggan');
    Route::put('/update/{id}', 'BackController@updatepelanggan');
    Route::get('/delete/{id}', 'BackController@deletepelanggan');
});
//  Link Halaman Kategori Admin
Route::prefix('kategori')->group(function () {
    Route::get('/', 'BackController@kategori');
    Route::get('/tambah', 'BackController@tambahkategori');
    Route::post('/store', 'BackController@storekategori');
    Route::get('/edit/{id}', 'BackController@editkategori');
    Route::put('/update/{id}', 'BackController@updatekategori');
    Route::get('/delete/{id}', 'BackController@deletekategori');
});
//  Link Halaman Staf Admin
Route::prefix('staf')->group(function () {
    Route::get('/', 'BackController@staf');
    Route::get('/tambah', 'BackController@tambahstaf');
    Route::post('/store', 'BackController@storestaf');
    Route::get('/edit/{id}', 'BackController@editstaf');
    Route::put('/update/{id}', 'BackController@updatestaf');
    Route::get('/delete/{id}', 'BackController@deletestaf');
});
//  Link Halaman Paket Admin
Route::prefix('paket')->group(function () {
    Route::get('/', 'BackController@paket');
    Route::get('/tambah', 'BackController@tambahpaket');
    Route::post('/store', 'BackController@storepaket');
    Route::get('/edit/{id}', 'BackController@editpaket');
    Route::put('/update/{id}', 'BackController@updatepaket');
    Route::get('/delete/{id}', 'BackController@deletepaket');
});
