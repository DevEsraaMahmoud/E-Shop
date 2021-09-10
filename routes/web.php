<?php

use App\Models\Brand;
use App\Models\Slider;
use App\Models\User;
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

Route::get('/', function () {
    $brands = Brand::all();
    $sliders = Slider::all();
    return view('home', compact('brands', 'sliders'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::post('/contact/form', [App\Http\Controllers\ContactController::class, 'ContactForm'])->name('contact.form');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'products'])->name('products');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/{product}', [App\Http\Controllers\CartController::class, 'addProduct'])->name('addProduct');

Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index'])->name('all.products');
Route::get('/admin/products/add', [App\Http\Controllers\ProductController::class, 'create'])->name('add.products');
Route::post('/admin/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store.products');
Route::get('/admin/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit.products');
Route::post('/admin/products/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update.products');
Route::get('/admin/products/{product}', [App\Http\Controllers\ProductController::class, 'delete'])->name('destroy.product');

Route::get('/home/slider', [App\Http\Controllers\HomeController::class, 'slider'])->name('home.slider');
Route::post('/slider/add', [App\Http\Controllers\HomeController::class, 'addSlider'])->name('add.slider');
Route::get('/admin/slider/{slider}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit.slider');
Route::post('/admin/slider/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update.slider');
Route::get('/admin/slider/{slider}', [App\Http\Controllers\HomeController::class, 'delete'])->name('destroy.slider');

Route::get('/category/all', [App\Http\Controllers\CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [App\Http\Controllers\CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/admin/category/{category}/edit', [App\Http\Controllers\CategoryController::class, 'EditCat'])->name('edit.category');
Route::post('/admin/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'UpdateCat'])->name('update.category');
Route::get('/admin/category/{category}', [App\Http\Controllers\CategoryController::class, 'Delete'])->name('destroy.category');

Route::get('/brand/all', [App\Http\Controllers\BrandController::class, 'index'])->name('all.brand');
Route::post('/brand/add', [App\Http\Controllers\BrandController::class, 'store'])->name('store.brand');
Route::get('/admin/brand/{brand}/edit', [App\Http\Controllers\BrandController::class, 'edit'])->name('edit.brand');
Route::post('/admin/brand/update/{id}', [App\Http\Controllers\BrandController::class, 'update'])->name('update.brand');
Route::get('/admin/brand/{brand}', [App\Http\Controllers\BrandController::class, 'delete'])->name('destroy.brand');

Route::get('/admin/contact', [App\Http\Controllers\ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/contact/add', [App\Http\Controllers\ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/admin/contact/store', [App\Http\Controllers\ContactController::class, 'store'])->name('store.contact');
Route::get('/admin/contact/{contact}', [App\Http\Controllers\ContactController::class, 'deleteContact'])->name('destroy.contact');

Route::get('/admin/messages', [App\Http\Controllers\ContactController::class, 'AdminMessages'])->name('admin.messages');
Route::get('/admin/messages/{message}', [App\Http\Controllers\ContactController::class, 'deleteMessage'])->name('destroy.message');
Route::put('/admin/messages/{message}/reply', [App\Http\Controllers\ContactController::class, 'messReply'])->name('reply.message');
Route::put('/admin/messages/{message}/unread', [App\Http\Controllers\ContactController::class, 'messUnread'])->name('unread.message');

/*Route::post('/admin/messages/update/{id}', [App\Http\Controllers\ContactController::class, 'messReply'])->name('reply.message');*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
/*    $users= User::all();*/

    return view('admin.index');
})->name('dashboard');
Route::get('/user/logout', [App\Http\Controllers\BrandController::class, 'logout'])->name('user.logout');

