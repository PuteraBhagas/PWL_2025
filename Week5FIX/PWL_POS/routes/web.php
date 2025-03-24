<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);  // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);  // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);  // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);  // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);  // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);  // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);  // menghapus data user
});

    Route::group(['prefix' => 'level'], function () {
        Route::get('/', [LevelController::class, 'index'])->name('level.index'); // Menampilkan daftar level
        Route::post('/list', [LevelController::class, 'getLevels'])->name('level.list'); // DataTables JSON
        Route::get('/create', [LevelController::class, 'create'])->name('level.create'); // Form tambah
        Route::post('/', [LevelController::class, 'store'])->name('level.store'); // Simpan data baru
        Route::get('/{id}', [LevelController::class, 'show'])->name('level.show'); // Menampilkan detail level
        Route::get('/{id}/edit', [LevelController::class, 'edit'])->name('level.edit'); // Form edit
        Route::put('/{id}', [LevelController::class, 'update'])->name('level.update'); // Simpan perubahan
        Route::delete('/{id}', [LevelController::class, 'destroy'])->name('level.destroy'); // Hapus level
    });


    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori.index'); // Menampilkan daftar kategori
        Route::post('/list', [KategoriController::class, 'getKategori'])->name('kategori.list'); // Data JSON untuk DataTables
        Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create'); // Form tambah kategori
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store'); // Simpan kategori baru
        Route::get('/{id}', [KategoriController::class, 'show'])->name('kategori.show'); // Detail kategori
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit'); // Form edit kategori
        Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update'); // Simpan perubahan kategori
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy'); // Hapus kategori
    });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/level',[LevelController::class,'index']);
// Route::get('/kategori',[KategoriController::class,'index']);
// Route::get('/user',[UserController::class,'index']);
// Route::get('/user/tambah',[UserController::class,'tambah']);
// Route::get('/user/tambah_simpan',[UserController::class,'tambah_simpan']);
// Route::get('/user/ubah/{id}',[UserController::class,'Ubah']);
// Route::get('/user/ubah_simpan/{id}',[UserController::class,'ubah_simpan']);

// Route::get('/',[WelcomeController::class,'index']);
