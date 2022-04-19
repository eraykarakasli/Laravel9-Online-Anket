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
#Survey Category
    Route::get('category',[\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin_category');
    Route::get('category/add',[\App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('admin_category_add');
    Route::get('category/edit/{id}',[\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin_category_edit');
    Route::post('category/create',[\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin_category_create');
    Route::post('category/update/{id}',[\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin_category_update');
    Route::get('category/delete/{id}',[\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin_category_delete');
    Route::get('category/show',[\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin_category_show');

#Survey
 Route::prefix('survey')->group(function () {
     Route::get('/', [\App\Http\Controllers\Admin\SurveyController::class, 'index'])->name('admin_surveys');
     Route::get('/create', [\App\Http\Controllers\Admin\SurveyController::class, 'create'])->name('admin_survey_create');
     Route::post('store', [\App\Http\Controllers\Admin\SurveyController::class, 'store'])->name('admin_survey_store');
     Route::get('edit/{id}', [\App\Http\Controllers\Admin\SurveyController::class, 'edit'])->name('admin_survey_edit');
     Route::post('update/{id}', [\App\Http\Controllers\Admin\SurveyController::class, 'update'])->name('admin_survey_update');
     Route::get('delete/{id}', [\App\Http\Controllers\Admin\SurveyController::class, 'destroy'])->name('admin_survey_delete');
     Route::get('show', [\App\Http\Controllers\Admin\SurveyController::class, 'show'])->name('admin_survey_show');
 });
 #Survey Image Gallery
    Route::prefix('image')->group(function () {

        Route::get('create/{survey_id}', [\App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_create');
        Route::post('store/{survey_id}', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
        Route::get('delete/{id}/{survey_id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
    });
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
