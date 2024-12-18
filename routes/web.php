<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hel', function () {
    return 'Hello World!';
});

Route::get('/hello', function () {
    return view('hello', ['name' => 'PHP Laravel']);
});

// Route::get('/hi', 'App\Http\Controllers\HelloController@index');

use App\Http\Controllers\HelloController;

Route::get('/hi', [HelloController::class,'index']);

use App\Http\Controllers\Admin\Dashboard;
Route::get('/admin', Dashboard::class);


Route::get('/brands', function () {
    $brands = \DB::table('brands')->get();
    // dd($brands);
    dump($brands);
});

use App\Http\Controllers\Admin\BrandController;

Route::get('/admin/brands', [BrandController::class, 'index']);
Route::get('/admin/brands/{id}', [BrandController::class, 'show']);
Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit']);
Route::get('/admin/brand', [BrandController::class, 'create']);

use App\Http\Controllers\Admin\CategoryController;

// Route::resource('admin/categories', CategoryController::class);

Route::name('admin.')->group(function() {
    Route::resource('admin/categories', CategoryController::class);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
