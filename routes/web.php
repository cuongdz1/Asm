<?php

use App\Models\DanhMuc;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\TaikhoanController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckRoleAdminMiddleware;

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



Route::get('/', function () {
    return view('welcome');
});




Route::get('login', [AuthController::class, 'ShowFormlogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showFormregister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/danhmucs', function () {
    return view('admins.danhmucs.index');
});

// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth');

// Route::get('/admin', function () {
//     return 'đây là admin';
// })->middleware(['auth', 'auth.admin']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', function () {
//         return view('home');
//     });

//     Route::middleware(['auth.admin'])->group(function () {
//     Route::get('/admin', function () {
//             return 'đây là admin';
//         })->middleware(['auth', 'auth.admin']);

// });  
// });

// Route Admin

Route::middleware(['auth', 'auth.admin'])->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admins.dashboard');
        })->name('dashboard');


        Auth::routes();


        

        Route::resource('product', ProductController::class);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


        //Route danh mục
        Route::prefix('danhmucs')
            ->as('danhmucs.')
            ->group(function () {
            Route::get('/', [DanhMucController::class, 'index'])->name('index');
            Route::get('/create', [DanhMucController::class, 'create'])->name('create');
            Route::post('/store', [DanhMucController::class, 'store'])->name('store');
            Route::get('/show/{id}', [DanhMucController::class, 'show'])->name('show');
            Route::get('{id}/edit', [DanhMucController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [DanhMucController::class, 'update'])->name('update');
            Route::delete('{id}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');

        });

        //Route sản phẩm
        Route::prefix('sanphams')
            ->as('sanphams.')
            ->group(function () {
            Route::get('/', [SanPhamController::class, 'index'])->name('index');
            Route::get('/create', [SanPhamController::class, 'create'])->name('create');
            Route::post('/store', [SanPhamController::class, 'store'])->name('store');
            Route::get('/show/{id}', [SanPhamController::class, 'show'])->name('show');
            Route::get('{id}/edit', [SanPhamController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [SanPhamController::class, 'update'])->name('update');
            Route::delete('{id}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');

        });

        Route::prefix('taikhoans')
            ->as('taikhoans.')
            ->group(function () {
            Route::get('/', [TaikhoanController::class, 'index'])->name('index');
            Route::get('/create', [TaikhoanController::class, 'create'])->name('create');
            Route::post('/store', [TaikhoanController::class, 'store'])->name('store');
            Route::get('/show/{id}', [TaikhoanController::class, 'show'])->name('show');
            Route::get('{id}/edit', [TaikhoanController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [TaikhoanController::class, 'update'])->name('update');
            Route::delete('{id}/destroy', [TaikhoanController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('donhangs')
            ->as('donhangs.')
            ->group(function () {
            Route::get('/', [DonHangController::class, 'index'])->name('index');
            Route::get('/create', [DonHangController::class, 'create'])->name('create');
            Route::post('/store', [DonHangController::class, 'store'])->name('store');
            Route::get('/show/{id}', [DonHangController::class, 'show'])->name('show');
            Route::get('{id}/edit', [DonHangController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [DonHangController::class, 'update'])->name('update');
            Route::delete('{id}/destroy', [DonHangController::class, 'destroy'])->name('destroy');
        });

    });


