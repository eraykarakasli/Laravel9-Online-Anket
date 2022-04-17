<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/',[HomeController::class,'index'])->name('home');



Route::middleware('auth')->prefix('admin')->group(function (){

//admin
    Route::get('/',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminhome');
//admin login
    Route::get('/login',[\App\Http\Controllers\Admin\HomeController::class, 'login'])->name('admin_login');
//admin login check
    Route::post('/logincheck',[\App\Http\Controllers\Admin\HomeController::class, 'logincheck'])->name('admin_logincheck');

    Route::get('/category',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_category');
    Route::get('/category/add',[\App\Http\Controllers\Admin\HomeController::class, 'add'])->name('admin_category_add');
    Route::get('/category/update',[\App\Http\Controllers\Admin\HomeController::class, 'update'])->name('admin_category_update');
    Route::get('/category/delete',[\App\Http\Controllers\Admin\HomeController::class, 'destroy'])->name('admin_category_delete');
    Route::get('/category/show',[\App\Http\Controllers\Admin\HomeController::class, 'show'])->name('admin_category_show');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
