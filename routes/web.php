
<?php

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SurveyController;
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

Route::get('/test',[HomeController::class,'test'])->name('test');

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::post('/sendmessage', [HomeController::class, 'sendmessage'])->name('sendmessage');
Route::get('/survey/{id}/{slug}', [HomeController::class, 'survey'])->name('survey');
Route::get('/categorysurveys/{id}/{slug}', [HomeController::class, 'categorysurveys'])->name('categorysurveys');
Route::post('/getsurvey', [HomeController::class, 'getsurvey'])->name('getsurvey');
Route::get('/surveylist/{search}', [HomeController::class, 'surveylist'])->name('surveylist');




Route::middleware('auth')->prefix('admin')->group(function (){

    #adminrole
    Route::middleware('admin')->group(function (){



    #FAQ
    Route::prefix('faq')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\FaqController::class, 'index'])->name('admin_faq');
        Route::get('create', [\App\Http\Controllers\Admin\FaqController::class, 'create'])->name('admin_faq_create');
        Route::post('store', [\App\Http\Controllers\Admin\FaqController::class, 'store'])->name('admin_faq_store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('admin_faq_edit');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'update'])->name('admin_faq_update');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('admin_faq_delete');
        Route::get('show', [\App\Http\Controllers\Admin\FaqController::class, 'show'])->name('admin_faq_show');
    });

//admin
    Route::get('/',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminhome');
//admin login
    Route::get('/login',[\App\Http\Controllers\Admin\HomeController::class, 'login'])->name('admin_login');
//admin login check
    Route::post('/logincheck',[\App\Http\Controllers\Admin\HomeController::class, 'logincheck'])->name('admin_logincheck');
    Route::get('/logout', [\App\Http\Controllers\Admin\HomeController::class, 'logout'])->name('admin_logout');
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
    #Message
    Route::prefix('message')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin_message');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('admin_message_edit');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'update'])->name('admin_message_update');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin_message_delete');
        Route::get('show', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin_message_show');
    });
 #Survey Image Gallery
    Route::prefix('image')->group(function () {

        Route::get('create/{survey_id}', [\App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_create');
        Route::post('store/{survey_id}', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
        Route::get('delete/{id}/{survey_id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
    });
 #Setting
    Route::get('setting',[\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_setting');
    Route::post('setting/update',[\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');

});

Route::prefix('review')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin_review');
    Route::post('update/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('admin_review_update');
    Route::get('delete/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('admin_review_delete');
    Route::get('show/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'show'])->name('admin_review_show');
});

    #User
    Route::prefix('user')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin_users');
        Route::post('create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin_user_add');
        Route::post('store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin_user_store');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin_user_update');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_user_edit');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin_user_delete');
        Route::get('show/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');
        Route::get('userrole/{id}', [\App\Http\Controllers\Admin\UserController::class, 'user_roles'])->name('admin_user_roles');
        Route::post('userrolestore/{id}', [\App\Http\Controllers\Admin\UserController::class, 'user_role_store'])->name('admin_user_role_add');
        Route::get('userroledelete/{userid}/{roleid}', [\App\Http\Controllers\Admin\UserController::class, 'user_role_delete'])->name('admin_user_role_delete');

    });

##### user profile
Route::middleware('auth')->prefix('myaccount')->namespace('myaccount')->group(function (){
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('myprofile');
    Route::get('/myreviews', [\App\Http\Controllers\UserController::class, 'myreviews'])->name('myreviews');
    Route::get('/destroymyreview/{id}', [\App\Http\Controllers\UserController::class, 'destroymyreview'])->name('user_review_delete');
  });
});

Route::middleware('auth')->prefix('user')->namespace('user')->group(function (){
  //  Route::get('/profile', [\App\Http\Controllers\UserController::class, 'index'])->name('userprofile');

    #USER SURVEYS
    Route::prefix('survey')->group(function () {
        Route::get('/', [SurveyController::class, 'index'])->name('user_surveys');
        Route::get('/create', [SurveyController::class, 'create'])->name('user_survey_create');
        Route::post('store', [SurveyController::class, 'store'])->name('user_survey_store');
        Route::get('/edit/{id}', [SurveyController::class, 'edit'])->name('user_survey_edit');
        Route::post('update/{id}', [SurveyController::class, 'update'])->name('user_survey_update');
        Route::get('delete/{id}', [SurveyController::class, 'destroy'])->name('user_survey_delete');
        Route::get('show', [SurveyController::class, 'show'])->name('user_survey_show');
    });
    #Survey Image Gallery
    Route::prefix('image')->group(function () {

        Route::get('create/{survey_id}', [ImageController::class, 'create'])->name('user_image_create');
        Route::post('store/{survey_id}', [ImageController::class, 'store'])->name('user_image_store');
        Route::get('delete/{id}/{survey_id}', [ImageController::class, 'destroy'])->name('user_image_delete');
    });
    #Attendance
    Route::prefix('attendance')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('user_attendance');
        Route::post('store/{id}', [AttendanceController::class, 'store'])->name('user_attendance_add');
        Route::post('update/{id}', [AttendanceController::class, 'update'])->name('user_attendance_update');
        Route::get('delete/{id}', [AttendanceController::class, 'destroy'])->name('user_attendance_delete');
    });
});





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
