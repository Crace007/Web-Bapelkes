<?php

use App\Http\Controllers\AdministrasiController;
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
use App\Http\Controllers\FileuserController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FotosaranaController;
use App\Http\Controllers\IventarisController;
use App\Http\Controllers\MateripelatihanController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\UserinfoController;
use App\Models\FasilitasSarana;
use Illuminate\Auth\Events\Registered;

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
Route::get('/home', [HomeController::class, 'index']);
Route::get('/show/{post:slug}', [HomeController::class, 'show']);
Route::get('/sejarah', [HomeController::class, 'sejarah']);
Route::get('/visiMisi', [HomeController::class, 'visiMisi']);
Route::get('/sdm', [HomeController::class, 'sdm']);
Route::get('/struktur_organisasi', [HomeController::class, 'strukturOrganisasi']);
Route::get('/mitra_kerja', [HomeController::class, 'mitraKerja']);
Route::get('/sarana', [HomeController::class, 'sarana']);

Route::get('/publikasi', [HomeController::class, 'publikasi']);

Route::get('/pelatihan', [HomeController::class, 'pelatihan']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->Middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register/peserta', [RegisterController::class, 'registerperserta'])->middleware('guest');

Route::get('/admin', [AdministrasiController::class, 'index'])->middleware('auth');
Route::get('/admin/blank', [AdministrasiController::class, 'blank'])->middleware('auth');


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

Route::get('/admin/users/setting', [UserController::class, 'setting'])->middleware('auth');
Route::get('/admin/users/setting/username', [UserController::class, 'usernameChange']);
Route::post('/admin/users/setting/username/{users:slug}', [UserController::class, 'updateUsername']);

Route::get('/admin/users/setting/email', [UserController::class, 'emailChange']);
Route::post('/admin/users/setting/email/{users:slug}', [UserController::class, 'updateEmail']);

Route::get('/admin/users/setting/password', [UserController::class, 'passwordChange']);
Route::post('/admin/users/setting/password/{users:slug}', [UserController::class, 'updatePassword']);

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

Route::resource('/admin/materipelatihans', MateripelatihanController::class)->middleware('auth');

Route::resource('/admin/fileusers', FileuserController::class)->middleware('auth');

Route::resource('/admin/info/users', UserinfoController::class)->middleware('auth');

Route::resource('/admin/iventaris', IventarisController::class)->middleware('auth');

Route::get('/admin/downloads/{id}', [DownloadController::class, 'getdownload'])->middleware('auth');

Route::resource('/admin/mitra', MitraController::class)->middleware('auth');

Route::resource('/admin/sarana', SaranaController::class)->middleware('auth');

Route::resource('/admin/fasilitas', FasilitasController::class)->middleware('auth');

Route::resource('/admin/fotosarana', FotosaranaController::class)->middleware('auth');
