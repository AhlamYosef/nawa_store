<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Catecory;
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
// Route::get('/admin/products',[ProductController::class,'index']);
// Route::get('/admin/products/create',[ProductController::class,'create']);
// Route::post('/admin/products',[ProductController::class,'store']);
// Route::get('/admin/products/{id}',[ProductController::class,'show']);
// Route::get('/admin/products/{id}/edit',[ProductController::class,'edit']);
// Route::put('/admin/products/{id}',[ProductController::class,'update']);
// Route::delete('/admin/products/{id}',[ProductController::class,'destroy']);

Route::resource('/admin/products',ProductController::class);
Route::resource('/admin/categories',CategoryController::class);


Route::get('/users',[UserController::class,'index']);
Route::get('/users/{name}',[UserController::class,'show']);


