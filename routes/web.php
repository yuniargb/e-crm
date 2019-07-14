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

// Testimoni
Route::prefix('testimonial')->group(function () {
    Route::get('/', 'FrontController@testimonial');
    Route::post('/store', 'FrontController@storetestimonial');
    Route::get('/get/invoiceId/{invoiceId}', 'FrontController@invoiceid');
});

// Tours
Route::prefix('tours')->group(function () {
    Route::get('/', 'FrontController@tours');
    Route::get('/detil/{id}', 'FrontController@detiltours');
});

// Chat
Route::prefix('chat')->group(function () {
    Route::get('/{id}', 'FrontController@chat');
    Route::get('/getinvoice/{id}', 'FrontController@getinv');
    Route::post('/send', 'FrontController@chatsend');
});

// Sign in pelanggan
// Sign page
Route::prefix('signin')->group(function () {
    Route::get('/', 'Auth\LoginPelangganController@showLoginForm')->name('pelanggan.login');
    Route::post('/', 'Auth\LoginPelangganController@login')->name('pelanggan.login.submit');
});

// Login google
Route::get('sign/google', 'Auth\LoginPelangganController@redirectToProvider');
Route::get('sign/google/callback', 'Auth\LoginPelangganController@handleProviderCallback');
// End login google

// User Frontend
Route::prefix('customer')->group(function () {
    Route::get('/', 'PelangganController@index')->name('pelanggan.dashboard');
    Route::get('/logout', 'Auth\LoginPelangganController@logout')->name('pelanggan.logout');
});

// Admin Login
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\LoginStafController@showLoginForm')->name('staf.login');
    Route::post('/login', 'Auth\LoginStafController@login')->name('staf.login.submit');
    Route::get('/', 'BackController@index')->name('staf.dashboard');
    Route::get('/logout', 'Auth\LoginStafController@stafLogout')->name('staf.logout');
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
    Route::get('/delfas/{id}', 'BackController@deletepaketfal');
});
//  Link Halaman Invoices Admin
Route::prefix('invoice')->group(function () {
    Route::get('/', 'BackController@invoice');
    Route::get('/tambah', 'BackController@tambahinvoice');
    Route::post('/store', 'BackController@storeinvoice');
    Route::get('/cetak/{id}', 'BackController@cetakinvoice');
});
//  Link Halaman Promosi Admin
Route::prefix('promo')->group(function () {
    Route::get('/', 'BackController@promosi');
    Route::get('/tambah', 'BackController@tambahpromosi');
    Route::post('/store', 'BackController@storepromosi');
    Route::get('/hapus/{id}', 'BackController@deletepromosi');
});
//  Link Halaman Testimoni Admin
Route::prefix('testimoni')->group(function () {
    Route::get('/', 'BackController@testimoni');
    Route::get('/publish/{id}', 'BackController@publishtestimoni');
    Route::get('/unpublish/{id}', 'BackController@unpublishtestimoni');
    Route::get('/delete/{id}', 'BackController@deletetestimoni');
});
//  Link Halaman Komplain Admin
Route::prefix('komplain')->group(function () {
    Route::get('/', 'BackController@komplain');
    Route::get('/pesan/{id}', 'BackController@pesan');
    Route::get('/read/{id}', 'BackController@read');
    Route::post('/balas', 'BackController@balas');
    Route::get('/notif', 'BackController@notif');
});
//  Link Halaman Laporan Admin
Route::get('/periodepelanggan', 'BackController@periodepelanggan');
Route::get('/periodepaket', 'BackController@periodepaket');
Route::get('/periodetestimoni', 'BackController@periodetestimoni');
Route::post('/cetakpelanggan', 'BackController@cetakpelanggan');
Route::post('/cetaktestimoni', 'BackController@cetaktestimoni');
Route::post('/cetakpaket', 'BackController@cetakpaket');

// Link Dashboard Admin
Route::get('/dashboard', 'BackController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
