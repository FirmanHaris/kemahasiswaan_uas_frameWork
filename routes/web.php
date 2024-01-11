<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\KaryaMhsController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LemawaController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\pengurusLemawaController;
use App\Http\Controllers\pengurusOrmawaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\UserController;
use App\Models\Pengurus_ormawa;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('frontend.__beranda');
// })->name('beranda');
Route::get('/', [BerandaController::class, 'beranda'])->name('beranda');
Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa');
Route::get('/ormawa_f', [pengurusOrmawaController::class, 'index'])->name('ormawa_f');
Route::get('/lemawa_f', [pengurusLemawaController::class, 'index'])->name('lemawa_f');
Route::get('/login', [UserController::class, 'getViewLogin'])->name('login');
Route::post('/loginAct', [UserController::class, 'loginAuth'])->name('loginAct');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/karya/ti', [KaryaMhsController::class, 'karyaTI'])->name('ti');
Route::get('/karya/si', [KaryaMhsController::class, 'karyaSI'])->name('si');

Route::get('/berita/detail/{id}', [BeritaController::class, 'detailShow']);
Route::get('/ormawa/detail/{id}', [OrmawaController::class, 'detailShow']);

Route::middleware('auth', 'cekrole:admin,mahasiswa')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.__dashboard');
    })->name('dashboard');
    Route::get('/berita/create', [BeritaController::class, 'showCreate'])->name('formadd_berita');
    Route::post('/berita/create', [BeritaController::class, 'create'])->name('insertBerita');
    Route::get('/berita/formUpdate/{id}', [BeritaController::class, 'showUpdate']);
    Route::put('/berita/update/{id}', [BeritaController::class, 'update']);
    Route::delete('/berita/delete/{id}', [BeritaController::class, 'delete']);

    Route::controller(PrestasiController::class)->group(function () {
        Route::get('/prestasi/create', 'showCreate')->name('formadd_prestasi');
        Route::post('/prestasi/create', 'create')->name('insert_prestasi');
        Route::get('/prestasi/formUpdate/{id}', 'showUpdate');
        Route::put('/prestasi/update/{id}', 'update');
        Route::delete('prestasi/delete/{id}', 'delete');
    });
    Route::controller(pengurusOrmawaController::class)->group(function () {
        Route::get('/pengurus_ormawa', 'index')->name('pengurus_ormawa');
        Route::get('/pengurus_ormawa/form', 'showInsert')->name('formP_ormawa');
        Route::post('/pengurus_ormawa/insert', 'insert')->name('insertP_ormawa');
        Route::get('/pengurus_ormawa/formUpdate/{id}', 'ShowUpdate');
        Route::put('/pengurus_ormawa/update/{id}', 'update');
        Route::delete('/penguru_ormawa/delete/{id}', 'deletePengurus');
    });
    Route::controller(pengurusLemawaController::class)->group(function () {
        Route::get('/pengurus_lemawa', 'index')->name('pengurus_lemawa');
        Route::get('/pengurus_lemawa/form', 'showInsert')->name('formP_lemawa');
        Route::post('/pengurus_lemawa/insert', 'insert')->name('insertP_lemawa');
        Route::get('/pengurus_lemawa/formUpdate/{id}', 'ShowUpdate');
        Route::put('/pengurus_lemawa/update/{id}', 'update');
        Route::delete('/penguru_lemawa/delete/{id}', 'deletePengurus');
    });
    Route::controller(KaryaMhsController::class)->group(function () {
        Route::get('/karyamhs', 'index')->name('karya');
        Route::get('/karyaMhs/formAdd', 'showAdd')->name('formAdd_karya');
        Route::post('/karyaMhs/add', 'addKarya')->name('add_karya');
        Route::get('/karyaMhs/formUpdate/{id}', 'showUpdate');
        Route::put('/karyaMhs/update/{id}', 'updateData');
        Route::delete('/karyaMhs/delete/{id}', 'deleteData');
    });
});
Route::middleware('auth', 'cekrole:admin')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('user');
        Route::get('/user/form_reg', 'viewReg')->name('register');
        Route::post('/user/register', 'register')->name('registerAdd');
        Route::delete('/user/delete/{id}', 'deleteUser');
    });
    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori', 'index')->name('kategori');
        Route::get('/kategori/formadd', 'formadd')->name('formadd');
        Route::post('/kategori/insert', 'insertKtgr')->name('insert_kategori');
        Route::get('/kategori/formUpdate/{id}', 'formUpdate');
        Route::put('/kategori/update/{id}', 'updateKtgr');
        Route::delete('/kategori/delete/{id}', 'deleteKtgr');
    });
    Route::controller(BeasiswaController::class)->group(function () {
        Route::get('/beasiswa/create', 'showCreate')->name('formadd_beasiswa');
        Route::post('/beasiswa/create', 'create')->name('insert_beasiswa');
        Route::get('/beasiswa/formUpdate/{id}', 'showUpdate');
        Route::put('/beasiswa/update/{id}', 'update');
        Route::delete('/beasiswa/delete/{id}', 'delete');
    });
    Route::controller(OrmawaController::class)->group(function () {
        Route::get('/ormawa', 'index')->name('ormawa_b');
        Route::get('/ormawa/create', 'showCreate')->name('formadd_ormawa');
        Route::post('/ormawa/create', 'create')->name('insert_ormawa');
        Route::get('/ormawa/update/{id}', 'showUpdate');
        Route::put('/ormawa/update/{id}', 'update');
        Route::delete('/ormawa/delete/{id}', 'delete');
    });
    Route::controller(LemawaController::class)->group(function () {
        Route::get('/lemawa', 'index')->name('lemawa_b');
        Route::get('/lembaga/form_add', 'showCreate')->name('formadd_lemawa');
        Route::post('/lembaga/add', 'create')->name('insert_lemawa');
        Route::get('/lembaga/formUpdate/{id}', 'showUpdate');
        Route::post('/lembaga/update/{id}', 'update');
        Route::delete('/lembaga/delete/{id}', 'delete');
    });
    Route::controller(DokumenController::class)->group(function () {
        Route::get('/dokumen/create', 'showCreate')->name('formadd_dokumen');
        Route::post('/dokumen/create', 'insert')->name('insert_dokumen');
        Route::get('/dokumen/formUpdate/{id}', 'showUpdate');
        Route::put('/dokumen/update/{id}', 'update');
        Route::delete('dokumen/delete/{id}', 'delete');
    });
});
