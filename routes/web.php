<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\ForntendController;
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

Route::get('/', function () {
    return view('frontend/index');
});
Route::controller(ForntendController::class)->group(function() {
    Route::get('', 'index')->name('index');

});



Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', function() {
        return view('admin.index');
    })->name('dashboard');

    // Hero Route
    Route::controller(HeroController::class)->group(function() {
        Route::get('/hero/edit', 'edit')->name('hero.edit');
        Route::post('/hero/update', 'update')->name('hero.update');
        Route::delete('/hero/delete', 'destroy')->name('admin.hero.destroy');
    });

    // About Route
    Route::controller(AboutController::class)->group(function() {
        // Home About Route
        Route::get('/home/about/edit', 'edit')->name('home.about.edit');
        Route::post('/home/about/update', 'update')->name('home.about.update');
        Route::post('/home/about/delete', 'delete')->name('home.about.delete');

        // Home About Image Route
        Route::get('/home/about/edit', 'edit')->name('home.about.edit');
        Route::post('/home/about/image/add', 'imageadd')->name('home.about.image.add');
        Route::post('/home/about/image/store', 'imagestore')->name('home.about.image.store');
        Route::post('/home/about/image/update', 'imageupdate')->name('home.about.image.update');
        Route::delete('/home/about/image/delete', 'imagedelete')->name('home.about.image.delete');

    });

});

 // Admin All Route
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
