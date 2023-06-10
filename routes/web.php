<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ContactUs;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', function () {
    // return view('welcome');
    return view('master.home');
});

// Route::get('/add', function () {
//     return view('mahasiswa.create');
// });

Route::resource('/mahasiswa', MahasiswaController::class);
