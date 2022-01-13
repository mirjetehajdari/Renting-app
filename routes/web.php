<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('');
Route::get('/my_posts', [App\Http\Controllers\PostController::class, 'my_posts'])->middleware('auth')->name('my_posts');
Route::get('/see_more', [App\Http\Controllers\PostController::class, 'show'])->middleware('auth')->name('');
Route::get('/add_bicycle', function () {
    return view('add_bicycle');
})->middleware('auth');

Route::get('/more_details', function () {
    return view('more_details');
});
Route::post('/post_bicycle', [App\Http\Controllers\PostController::class, 'store'])->middleware('auth')->name('post_bicycle');
Route::get('/search', [App\Http\Controllers\PostController::class, 'search'])->name('search');
Route::get('/sort', [App\Http\Controllers\PostController::class, 'sort'])->name('sort');

Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->middleware('auth')->name('delete');
Route::get('/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->middleware('auth')->name('edit');

Route::post('/update', [App\Http\Controllers\PostController::class, 'update'])->name('update');
// Route::get('/rent', [App\Http\Controllers\RentController::class, 'index'])->name('index');

Route::get('/rent/{id}', [App\Http\Controllers\RentController::class, 'rent'])->middleware('auth')->name('rent');
Route::post('/rent_bike', [App\Http\Controllers\RentController::class, 'rent_bike'])->name('rent_bike');

Route::get('/orders', [App\Http\Controllers\RentController::class, 'index'])->middleware('auth')->name('orders');
Route::get('/my_orders', [App\Http\Controllers\RentController::class, 'my_orders'])->middleware('auth')->name('my_orders');

Route::post('/confirm_order', [App\Http\Controllers\RentController::class, 'confirm_order'])->name('confirm_order');

Route::get('/delete_order/{id}', [App\Http\Controllers\RentController::class, 'delete_order'])->middleware('auth')->name('delete_order');
Route::get('/edit_order/{id}', [App\Http\Controllers\RentController::class, 'edit'])->middleware('auth')->name('edit_order');
Route::post('/update_order', [App\Http\Controllers\RentController::class, 'update_order'])->middleware('auth')->name('update_order');








