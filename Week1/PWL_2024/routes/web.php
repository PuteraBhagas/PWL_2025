<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PhotoController;

Route::get('/greeting', [WelcomeController::class, 'greeting']);
// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Putera Bhagaswara R']);
//     });
    
// Route::resource('photos', PhotoController::class)->only([ 'index', 'show'
// ]);

// Route::resource('photos', PhotoController::class)->except([ 'create', 'store', 'update', 'destroy'
// ]);


// Route::resource('photos', PhotoController::class);
// Route::get('/', [PageController::class, 'index']);

// Route::get('/about', [PageController::class, 'about']);

// Route::get('/articles/{id}', [PageController::class,'articles']);

// Route::get('/', HomeController::class);

// Route::get('/about', AboutController::class);

// Route::get('/articles/{id}', ArticleController::class);


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

// Route::get('/', function () { //Menampilkan halaman welcome.blade.php.

//     return view('welcome');
// });

Route::resource('items', ItemController::class); // Otomatis membuat semua route CRUD untuk ItemController, sehingga kita tidak perlu menuliskannya satu per satu.  