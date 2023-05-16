<?php

use App\Models\Biodata;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AlumniPostController;
use App\Http\Controllers\AlumniBiodataController;

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
    return view('home', [
        "title" => "home",
        "biodatas" => Biodata::all()
    ]);
});


Route::get('/login', [LoginController::class, "index"])->name('login')->middleware("guest");
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);


Route::get('/register', [RegisterController::class, "index"])->middleware("guest");
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/alumni', function () {
    return view('alumni.index');
});

Route::resource('/alumni/bios', AlumniController::class)->middleware("auth");
