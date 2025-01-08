<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/hel', function () {
//     return 'Hello World!';
// });

// Route::get('/hello', function () {
//     return view('hello', ['name' => 'PHP Laravel']);
// });

// Route::get('/hi', 'App\Http\Controllers\HelloController@index');

// use App\Http\Controllers\HelloController;

// Route::get('/hi', [HelloController::class,'index']);



use App\Http\Controllers\Admin\Dashboard;
Route::get('/admin', Dashboard::class);


// Route::get('/brands', function () {
//     $brands = \DB::table('brands')->get();
//     // dd($brands);
//     dump($brands);
// });

use App\Http\Controllers\Admin\BrandController;

Route::get('/admin/brands', [BrandController::class, 'index']);
Route::get('/admin/brands/{id}', [BrandController::class, 'show']);
Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit']);
Route::get('/admin/brand', [BrandController::class, 'create']);

use App\Http\Controllers\Admin\{CategoryController, UserController};

// Route::resource('admin/categories', CategoryController::class);

Route::name('admin.')->group(function() {
    Route::resource('admin/categories', CategoryController::class);
    Route::get('admin/users', [UserController::class, 'index']);
});

use App\Livewire\Admin\Users\UserList;

Route::get('users', UserList::class);

use App\Livewire\Admin\Products\{ProductTable, CreateProduct, EditProduct};

Route::get('admin/products', ProductTable::class)->name('admin.products');
Route::get('admin/products/create', CreateProduct::class)->name('admin.products.create');
Route::get('admin/products/{product}/edit', EditProduct::class)->name('admin.products.edit');


use App\Livewire\Admin\Posts\{PostTable, CreatePost, EditPost};

Route::get('admin/posts', PostTable::class)->name('admin.posts');
Route::get('admin/posts/create', CreatePost::class)->name('admin.posts.create');
Route::get('admin/posts/{post}/edit', EditPost::class)->name('admin.posts.edit');


use App\Livewire\Main\{BlogPage, PostShow, Catalog, ShoppingCart, HomePage};

Route::get('blog', BlogPage::class)->name('blog');
Route::get('post/show/{post:slug}', PostShow::class)->name('post.show');

Route::get('shop', Catalog::class)->name('shop');
Route::get('shopping-cart', ShoppingCart::class)->name('shopping.cart');

Route::get('/checkout', function () {
    return 'Checkout!';
})->name('checkout');



Route::get('/', HomePage::class)->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
