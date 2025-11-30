<?php
use App\Http\Controllers\Admin\classificationController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\typeController;
use \App\Http\Controllers\Admin\bookController;
use App\Http\Controllers\Admin\DashboadController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('classifications',classificationController::class)->names([
    'index'=>'classifications.index',
    'create'=>'classifications.create',
    'store'=>'classifications.store',
    'show'=>'classifications.show',
    'edit'=>'classifications.edit',
    'update'=>'classifications.update',
    'destroy'=>'classifications.destroy']);

    Route::resource('categories',categoryController::class)->names([
        'index'=>'categories.index',
        'create'=>'categories.create',
        'store'=>'categories.store',
        'show'=>'categories.show',
        'edit'=>'categories.edit',
        'update'=>'categories.update',
        'destroy'=>'categories.destroy']);
        

        Route::resource('types',typeController::class)->names([
            'index'=>'types.index',
            'create'=>'types.create',
            'store'=>'types.store',     
            'show'=>'types.show',
            'edit'=>'types.edit',
            'update'=>'types.update',
            'destroy'=>'types.destroy']);

            Route::resource('books',bookController::class)->names([
                'index'=>'books.index',
                'create'=>'books.create',
                'store'=>'books.store',     
                'show'=>'books.show',
                'edit'=>'books.edit',
                'update'=>'books.update',
                'destroy'=>'books.destroy']);

                Route::resource('dashboard', DashboadController::class)->names([
                    'index'=>'dashboard.index',
                ]);