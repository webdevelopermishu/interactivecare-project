<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Home Controller
Route::get('test', [HomeController::class, 'test'])->name('test');
Route::get('/demo', [DemoController::class, 'demo'])->name('demo');

//Main Controller


//Product Controller
Route::get('/products', [ProductController::class, 'products'])->name('products');
Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/view{id}', [ProductController::class, 'product_view'])->name('product.view');
Route::get('/product/edit{id}', [ProductController::class, 'product_edit'])->name('product.edit');
Route::post('/product/upadte{id}', [ProductController::class, 'product_update'])->name('product.update');
Route::get('/product/delete{id}', [ProductController::class, 'product_delete'])->name('product.delete');

