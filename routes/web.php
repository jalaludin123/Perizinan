<?php

use App\Http\Controllers\Admin\JenisBadanUsahaController;
use App\Http\Controllers\Admin\JenisUsahaController;
use App\Http\Controllers\Admin\Kbli1Controller;
use App\Http\Controllers\Admin\Kbli2Controller;
use App\Http\Controllers\Admin\Kbli3Controller;
use App\Http\Controllers\Admin\Kbli4Controller;
use App\Http\Controllers\Admin\Kbli5Controller;
use App\Http\Controllers\Admin\PanduanOssController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkalaUsahaController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ViewUserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\KbliController;
use App\Http\Controllers\User\PendaftaranController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Auth::routes();
Auth::routes(['verify' => true]);
Route::controller(WilayahController::class)->group(function () {
    Route::get('getKecamatan/{cityId}', 'getKecamatan');
    Route::get('getKelurahan/{kecamatanId}', 'getKelurahan');
});
Route::controller(KbliController::class)->group(function () {
    Route::get('getKbli2/{kbli1Id}', 'getKbli2');
    Route::get('getKbli3/{kbli2Id}', 'getKbli3');
    Route::get('getKbli4/{kbli3Id}', 'getKbli4');
    Route::get('getKbli5/{kbli4Id}', 'getKbli5');
});
Route::controller(PendaftaranController::class)->group(function () {
    Route::get('daftar', 'index');
    Route::get('create-akun', 'createAkun');
    Route::get('getDataJenisUsaha/{jenisUsaha_id}', 'getDataJenisUsaha');
    Route::get('getDataSkalaUsaha/{skalaUsaha_id}', 'getDataSkalaUsaha');
    Route::post('pendaftaran', 'store');
    Route::get('downloadSertifikat/{pendaftaran}', 'sertifikat');
});
Route::controller(HomePageController::class)->group(function () {
    Route::get('/',  'index');
    Route::get('kbli2/{kbli1}', 'getKbli2');
    Route::get('kbli3/{kbli2}', 'getKbli3');
    Route::get('kbli4/{kbli3}', 'getKbli4');
    Route::get('kbli5/{kbli4}', 'getKbli5');
    Route::get('panduanOss', 'panduanOss');
    Route::get('panduanOss/viewPdf/{panduan}', 'viewPdf');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('dataPermohonan/{pendaftaran}', 'dataPermohonan');
});
Route::prefix('admin')->middleware(['auth', 'role'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('user', UserController::class);
    Route::resource('viewUser', ViewUserController::class);
    Route::resource('skala-usaha', SkalaUsahaController::class);
    Route::resource('jenis-usaha', JenisUsahaController::class);
    Route::resource('jenis-badan-usaha', JenisBadanUsahaController::class);
    Route::resource('kbli1', Kbli1Controller::class);
    Route::resource('kbli2', Kbli2Controller::class);
    Route::resource('kbli3', Kbli3Controller::class);
    Route::resource('kbli4', Kbli4Controller::class);
    Route::resource('kbli5', Kbli5Controller::class);
    Route::resource('slide', SlideController::class);
    Route::get('slide-status/{slide}', [SlideController::class, 'updateStatus']);
    Route::resource('setting', SettingController::class);
    Route::controller(ReportController::class)->group(function () {
        Route::get('terverifikasi', 'terverifikasi');
        Route::get('tidakTerverifikasi', 'tidakTerverifikasi');
        Route::get('tidakTerverifikasi/{pendaftaran}', 'detailPendaftaran');
        Route::get('terverifikasi/{pendaftaran}', 'detailTerverifikasi');
        Route::get('genratePdf', 'printPdf');
        Route::get('verifikasi/{pendaftaran}', 'verifikasiPerizinan');
        Route::delete('deleteData/{pendaftaran}', 'destroyTerverifikasi');
        Route::delete('delete/{pendaftaran}', 'destroyTidakTerverifikasi');
        Route::get('printAll', 'printAll');
    });
    Route::resource('panduan', PanduanOssController::class);
    Route::get('panduan/{panduan}/viewPdf', [PanduanOssController::class, 'viewPdf']);
});