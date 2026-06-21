<?php

use App\Http\Controllers\Admin\classificationController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\typeController;
use \App\Http\Controllers\Admin\bookController;
use App\Http\Controllers\Admin\DashboadController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Auth\authController;
use App\Http\Controllers\User\usrBookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
 use App\Http\Controllers\User\CartController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\OrederController;



//Route::get('/login', function () {
  //  return redirect()->route('admin.login');
//})->name('login');
// Add this BEFORE the admin middleware group
Route::get('/books', function () {
    if (!Auth::guard('admin')->check()) {
        Session::put('url.intended', url()->current());
        return redirect()->route('login');
    }
})->name('books.access');

Route::get('adminLogin', [authController::class, 'adminlogin'])->name('admin.login');
Route::post('adminCheckLogin', [authController::class, 'adminCheckLogin'])->name('admin.checklogin');

Route::get('userLogin', [authController::class, 'userlogin'])->name('user.login');
Route::post('userCheckLogin', [authController::class, 'userCheckLogin'])->name('user.checklogin');
Route::post('userCheckRegister', [authController::class, 'userCheckRegister'])->name('user.checkregister');
Route::get('userRegister', [authController::class, 'userregister'])->name('user.register');

//register
//check register 

//// index is not found 
Route::get('/', [homeController::class, 'home'])->name('home');
Route::get('about', [homeController::class, 'about'])->name('about');
Route::get('contact', [homeController::class, 'contact'])->name('contact');


Route::middleware('auth:admin')->group(function () {
    Route::resource('classifications', classificationController::class)->names([
        'index' => 'classifications.index',
        'create' => 'classifications.create',
        'store' => 'classifications.store',
        'show' => 'classifications.show',
        'edit' => 'classifications.edit',
        'update' => 'classifications.update',
        'destroy' => 'classifications.destroy'
    ]);

    Route::resource('categories', categoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy'
    ]);

    //Route::resource('dashboard', DashboadController::class)->names([
    //  'index'=>'dashboard.index',]);
    Route::get('dashboard', [DashboadController::class, 'index'])->name('dashboard.index');

    Route::resource('types', typeController::class)->names([
        'index' => 'types.index',
        'create' => 'types.create',
        'store' => 'types.store',
        'show' => 'types.show',
        'edit' => 'types.edit',
        'update' => 'types.update',
        'destroy' => 'types.destroy'
    ]);

    Route::resource('books', bookController::class)->names([
        'index' => 'books.index',
        'create' => 'books.create',
        'store' => 'books.store',
        'show' => 'books.show',
        'edit' => 'books.edit',
        'update' => 'books.update',
        'destroy' => 'books.destroy'
    ]);

    Route::get('/logout', [authController::class, 'Logout'])->name('logout');
   






});
Route::middleware('auth:user')->group(function () {

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/add', [CartController::class, 'store'])->name('cart.store');

    Route::post('/increase', [CartController::class, 'update'])->name('cart.increase');

    Route::post('/decrease', [CartController::class, 'remove'])->name('cart.decrease');

    Route::delete('/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');


     Route::get('/orders', [OrederController::class, 'index'])->name('orders.index');
        
    Route::get('/orders/{order}', [OrederController::class, 'show'])->name('orders.show');
     Route::get('/checkout', [OrederController::class, 'checkout'])->name('checkout');
     Route::post('/orders/store', [OrederController::class, 'store'])->name('orders.store');
    
    
    // User book routes
    Route::get('user/books', [usrBookController::class, 'index'])->name('user.book.index');
    Route::get('user/search', [usrBookController::class, 'search'])->name('user.book.search');
});
    // Checkout route (optional - if you want separate checkout page)
    
Route::get('/login', function () {
$intendedUrl=Session::get('url.intended');
$path=$intendedUrl ? parse_url($intendedUrl,PHP_URL_PATH) : '/';
if(str_starts_with($path,'/admin')){
   return redirect()->route('admin.login');
}if (str_starts_with($path,'/user')){
    return redirect()->route('user.login');}
})->name('login');
    

