<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/',[MainController::class,'home'])->name('home-page');
Route::get('/contact/',[MainController::class,'contact'])->name('contact-page');
Route::get('/customers/',[MainController::class,'customers'])->name('customers');
Route::post('/register/',[MainController::class,'register'])->name('register');


Route::get('/about/',[MainController::class,'about'])->name('about');

