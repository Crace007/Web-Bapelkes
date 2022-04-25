<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OtherinfoController;
use App\Http\Controllers\InfocategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostcategoryController;
use App\Http\Controllers\RankcategoryController;
use App\Http\Controllers\JobcategoryController;
use App\Http\Controllers\TrainingScheduleController;
use App\Http\Controllers\FilecategoryController;
use App\Http\Controllers\FileuserControllers;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index']);
Route::get('/show/{post:slug}', [HomeController::class, 'show']);
Route::get('/sejarah', [HomeController::class, 'sejarah']);
Route::get('/visiMisi', [HomeController::class, 'visiMisi']);
Route::get('/sdm', [HomeController::class, 'sdm']);
Route::get('/tentangBapelkes', [HomeController::class, 'tentangBapelkes']);

Route::get('/publikasi', [HomeController::class, 'publikasi']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->Middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/admin', function () {
    return view('admin.dashboard.index');
})->middleware('auth');

Route::get('/admin/desain', function () {
    return view('admin.dashboard.desain');
});

Route::get('/admin/posts/checkSlug', [PostController::class, 'checkSlug'])->middleware('auth');
Route::get('admin/posts/remove/{images:id}', [PostController::class, 'removeimg'])->middleware('auth');

Route::resource('/admin/posts', PostController::class)->middleware('auth');
Route::resource('/admin/otherinfos', OtherinfoController::class)->middleware('auth');
Route::resource('/admin/employees', EmployeeController::class)->middleware('auth');
Route::resource('/admin/trainingschedule', TrainingScheduleController::class)->middleware('auth');

Route::resource('/admin/postcategories', PostcategoryController::class, [
    'except' => ['show']
])->middleware('auth');

Route::resource('/admin/infocategories', InfocategoryController::class, [
    'except' => ['show']
])->middleware('auth');

Route::post('/admin/users/uploadProfile/{users:id}', [UserController::class, 'uploadPP'])->middleware('auth');
Route::get('/admin/users/removeProfile/{users:id}', [UserController::class, 'removePP'])->middleware('auth');
Route::resource('/admin/users', UserController::class, [
    'except' => ['show']
])->middleware('auth');

Route::resource('/admin/rankcategories', RankcategoryController::class, [
    'except' => ['show']
])->middleware('auth');

Route::resource('/admin/jobcategories', JobcategoryController::class, [
    'except' => ['show']
])->middleware('auth');

Route::resource('/admin/filecategories', FilecategoryController::class, [
    'except' => ['show']
])->middleware('auth');

Route::post('/admin/fileuser/uploadFile/', [FileuserControllers::class, 'store'])->Middleware('auth');
