<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\PagesController::class,'index'])->name('home');
Route::get('/main', [App\Http\Controllers\MainPagesController::class,'main'])->name('main');
Route::get('/events', [App\Http\Controllers\EventPagesController::class,'index'])->name('event');
Route::put('/main', [App\Http\Controllers\MainPagesController::class, 'update'])->name('main.update');
Route::get('/events/create', [App\Http\Controllers\EventPagesController::class,'create'])->name('event.create');
Route::put('/events/store', [App\Http\Controllers\EventPagesController::class,'store'])->name('event.store');
Route::get('/events/edit/{id}', [App\Http\Controllers\EventPagesController::class,'edit'])->name('event.edit');
Route::post('/events/update/{id}', [App\Http\Controllers\EventPagesController::class,'update'])->name('event.update');
Route::delete('/events/destroy/{id}', [App\Http\Controllers\EventPagesController::class,'destroy'])->name('event.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
