<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['prefix' => 'dashboard'], function() {

    // Admin Berita
    Route::get('/berita','App\Http\Controllers\C_Berita@index')->name('dashboard.berita');
    // Route::get('/form/berita','App\Http\Controllers\C_Berita@formberita')->name('dashboard.form.berita');
    Route::get('/detail/berita','App\Http\Controllers\C_Berita@detail')->name('dashboard.detail.berita');
    Route::post('/store/berita','App\Http\Controllers\C_Berita@store')->name('dashboard.store.berita');
    Route::post('/update/berita','App\Http\Controllers\C_Berita@update')->name('dashboard.update.berita');
    Route::post('/delete/berita','App\Http\Controllers\C_Berita@delete')->name('dashboard.delete.berita');

    // Admin Kategori Page
    Route::get('/berita/kategoriberita','App\Http\Controllers\C_KategoriBerita@index')->name('dashboard.kategoriberita');
    Route::get('/get/berita/kategoriberita','App\Http\Controllers\C_KategoriBerita@get')->name('dashboard.get.berita.kategoriberita');
    Route::get('/detail/berita/kategoriberita','App\Http\Controllers\C_KategoriBerita@detail')->name('dashboard.detail.berita.kategoriberita');
    Route::post('/store/berita/kategoriberita','App\Http\Controllers\C_KategoriBerita@store')->name('dashboard.store.berita.kategoriberita');
    Route::post('/update/berita/kategoriberita','App\Http\Controllers\C_KategoriBerita@update')->name('dashboard.update.berita.kategoriberita');
    Route::post('/delete/berita/kategoriberita','App\Http\Controllers\C_KategoriBerita@delete')->name('dashboard.delete.berita.kategoriberita');

    // Admin Destinasi
    Route::get('/destinasi','App\Http\Controllers\C_Destinasi@index')->name('dashboard.destinasi');
    Route::get('/form/destinasi','App\Http\Controllers\C_Destinasi@formberita')->name('dashboard.form.destinasi');
    Route::get('/detail/destinasi','App\Http\Controllers\C_Destinasi@detail')->name('dashboard.detail.destinasi');
    Route::post('/store/destinasi','App\Http\Controllers\C_Destinasi@store')->name('dashboard.store.destinasi');
    Route::post('/update/destinasi','App\Http\Controllers\C_Destinasi@update')->name('dashboard.update.destinasi');
    Route::post('/delete/destinasi','App\Http\Controllers\C_Destinasi@delete')->name('dashboard.delete.destinasi');

    // Admin Kategori Destinasi
    Route::get('/destinasi/kategoridestinasi','App\Http\Controllers\C_KategoriDestinasi@index')->name('dashboard.kategoridestinasi');
    Route::get('/get/destinasi/kategoridestinasi','App\Http\Controllers\C_KategoriDestinasi@get')->name('dashboard.get.berita.kategoridestinasi');
    Route::get('/detail/destinasi/kategoridestinasi','App\Http\Controllers\C_KategoriDestinasi@detail')->name('dashboard.detail.berita.kategoridestinasi');
    Route::post('/store/destinasi/kategoridestinasi','App\Http\Controllers\C_KategoriDestinasi@store')->name('dashboard.store.berita.kategoridestinasi');
    Route::post('/update/destinasi/kategoridestinasi','App\Http\Controllers\C_KategoriDestinasi@update')->name('dashboard.update.berita.kategoridestinasi');
    Route::post('/delete/destinasi/kategoridestinasi','App\Http\Controllers\C_KategoriDestinasi@delete')->name('dashboard.delete.berita.kategoridestinasi');
});   
    // Main
    
    Route::get('/','App\Http\Controllers\C_Main@index')->name('main.index');
    Route::post('/store','App\Http\Controllers\C_Main@storereview')->name('main.store');
    Route::get('/dashboard','App\Http\Controllers\dashboard@home')->name('dashboard'); 
    Route::get('/destinasi','App\Http\Controllers\C_Main@destinasi')->name('main.destinasi');
    Route::get('/destinasi/{slug}','App\Http\Controllers\C_Main@destinasi_detail')->name('main.destinasi.detail');
    Route::get('/download/{filename}/{slug}','App\Http\Controllers\C_Main@download')->name('main.destinasi.download');
    Route::get('/video','App\Http\Controllers\C_Main@video')->name('main.destinasi.video');
    Route::get('/berita','App\Http\Controllers\C_Main@berita')->name('main.berita');
    Route::get('/berita/{slug}','App\Http\Controllers\C_Main@berita_detail')->name('main.berita.detail');
    Route::get('/review','App\Http\Controllers\C_Main@review')->name('main.review');
    
    // Review
    Route::get('/get/review','App\Http\Controllers\C_Review@get')->name('get.review');
    Route::post('/store/review','App\Http\Controllers\C_Review@store')->name('store.review');
    






