<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\AgendaController;
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
use App\Http\Controllers\RolecategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\UserinfoController;
use App\Models\FasilitasSarana;
use App\Models\Post;
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

//guest
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
Route::get('/agenda', [HomeController::class, 'agenda']);
Route::get('/agenda/{agendas:slug}', [HomeController::class, 'showAgenda']);

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index'])->Middleware('admin');
Route::post('/register', [RegisterController::class, 'store'])->Middleware('admin');
Route::get('/register/peserta', [RegisterController::class, 'registerperserta'])->middleware('admin');

//dashboard
Route::get('/admin', [AdministrasiController::class, 'index'])->middleware('auth');
Route::get('/admin/date', [AdministrasiController::class, 'date'])->middleware('auth');
Route::get('/admin/blank', [AdministrasiController::class, 'blank'])->middleware('auth');

//post
Route::get('/admin/posts/checkSlug', [PostController::class, 'checkSlug'])->middleware('auth');
Route::get('admin/posts/remove/{images:id}', [PostController::class, 'removeimg'])->middleware('auth');

Route::resource('/admin/posts', PostController::class)->middleware('auth');
Route::post('/admin/posts/delete/{post}', [PostController::class, 'deletepost'])->middleware('auth');

//sdm
Route::resource('/admin/employees', EmployeeController::class)->middleware('auth');

//pelatihan
Route::resource('/admin/trainingschedule', TrainingScheduleController::class)->middleware('auth');
Route::resource('/admin/materipelatihans', MateripelatihanController::class)->middleware('auth');

//profile
Route::resource('/admin/users', UserController::class)->middleware('auth')->except('show');
Route::post('/admin/users/uploadProfile/{users:id}', [UserController::class, 'uploadPP'])->middleware('auth');
Route::get('/admin/users/removeProfile/{users:id}', [UserController::class, 'removePP'])->middleware('auth');
Route::get('/admin/users/setting', [UserController::class, 'setting'])->middleware('auth');
//profile setting username
Route::get('/admin/users/setting/username', [UserController::class, 'usernameChange'])->middleware('auth');
Route::post('/admin/users/setting/username/{users:slug}', [UserController::class, 'updateUsername'])->middleware('auth');
//profile setting email
Route::get('/admin/users/setting/email', [UserController::class, 'emailChange'])->middleware('auth');
Route::post('/admin/users/setting/email/{users:slug}', [UserController::class, 'updateEmail'])->middleware('auth');
//profile setting password
Route::get('/admin/users/setting/password', [UserController::class, 'passwordChange'])->middleware('auth');
Route::post('/admin/users/setting/password/{users:slug}', [UserController::class, 'updatePassword'])->middleware('auth');

//file and Download File User
Route::resource('/admin/fileusers', FileuserController::class)->middleware('auth')->except('index', 'edit');
Route::get('/admin/downloads/{id}', [DownloadController::class, 'getdownload'])->middleware('auth');

//sarpras
Route::resource('/admin/iventaris', IventarisController::class)->middleware('auth');
//fasilitas
Route::resource('/admin/sarana', SaranaController::class)->middleware('auth');
Route::resource('/admin/fasilitas', FasilitasController::class)->middleware('auth')->except('show');
Route::resource('/admin/fotosarana', FotosaranaController::class)->middleware('auth')->except('show');

//Agenda Menu
Route::resource('/admin/agenda', AgendaController::class)->middleware('auth');

//routs Admin
Route::resource('/admin/rolecategories', RolecategoryController::class)->middleware('admin')->except('show');
Route::resource('/admin/rules', RoleController::class)->middleware('admin')->except('show', 'store', 'create');
Route::resource('/admin/rankcategories', RankcategoryController::class)->middleware('admin')->except('show');
Route::resource('/admin/jobcategories', JobcategoryController::class)->middleware('admin')->except('show');
Route::resource('/admin/filecategories', FilecategoryController::class)->middleware('admin')->except('show');
Route::resource('/admin/info/users', UserinfoController::class)->middleware('admin');
Route::resource('/admin/postcategories', PostcategoryController::class)->middleware('admin')->except('show');
Route::resource('/admin/infocategories', InfocategoryController::class)->middleware('admin')->except('show');
Route::resource('/admin/mitra', MitraController::class)->middleware('admin')->except('show');
Route::resource('/admin/otherinfos', OtherinfoController::class)->middleware('admin');
