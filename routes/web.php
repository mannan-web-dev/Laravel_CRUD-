<?php

use App\Http\Controllers\TestController;
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
//     return view('index');
// });

Route::get('/', [TestController::class,'index'])->name('index');
Route::get('/create', [TestController::class,'create'])->name('create');
Route::post('/store', [TestController::class,'store'])->name('store');

Route::get('edit/{test_id}', [TestController::class, 'update'])->name('edit');
Route::post('edit-store', [TestController::class, 'editStore'])->name('editStore');
Route::delete('delete', [TestController::class, 'destroy'])->name('delete');

