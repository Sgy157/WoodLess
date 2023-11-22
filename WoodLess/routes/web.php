<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::view('/about', 'about');

Route::view('/categories', 'categories');

Route::view('/contact', 'contact');

//Display single product
Route::get('/product/{product}', [ProductController::class,'show']);

Route::view('/products', 'product-list');