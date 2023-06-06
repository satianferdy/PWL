<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUs;
use App\Http\Controllers\UserController;

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

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('master.home');
    })->name('home');

    Route::get('/product', function () {
        return view('master.product');
    })->name('product');

    Route::get('/program', function () {
        return view('master.program');
    })->name('program');

    // Route::resource('/user', UserController::class);
});

Route::get('/news/{id}', function ($id) {
    return view('master.news', ['id' => $id]);
});

Route::get('/about-us', function () {
    return view('master.about-us');
})->name('about-us');


Route::resource('/contact-us', ContactUs::class)->only(['index']);
Route::resource('/user', UserController::class)->only(['index']);
// Route::resource('about-us', 'aboutUs');
// Route::resource('contact-us', 'ContactUs');


