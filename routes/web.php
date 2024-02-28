<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\PortfolioController;
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
    Route::get('/about', 'about')->name('about');

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

        // Multi Image
        Route::get('/about/multi-image', 'Multi_index')->name('about.multi-image.index');
        Route::get('/about/multi-image/create', 'Multi_create')->name('about.multi-image.create');
        Route::post('/about/multi-image', 'Multi_store')->name('about.multi-image.store');
        Route::get('/about/multi-image/edit/{id}', 'Multi_edit')->name('about.multi-image.edit');
        Route::put('/about/multi-image/{id}', 'Multi_update')->name('about.multi-image.update');
        Route::delete('/about/multi-image/destroy/{id}', 'Multi_destroy')->name('about.multi-image.destroy');

        // experience Routes
        Route::get('/about/experience', 'experience_index')->name('about.experience.index');
        Route::get('/about/experience/create', 'experience_create')->name('about.experience.create');
        Route::post('/about/experience', 'experience_store')->name('about.experience.store');
        Route::get('/about/experience/edit/{id}', 'experience_edit')->name('about.experience.edit');
        Route::put('/about/experience/{id}', 'experience_update')->name('about.experience.update');
        Route::delete('/about/experience/destroy/{id}', 'experience_destroy')->name('about.experience.destroy');
    });

    // Portfolio Route
    Route::controller(PortfolioController::class)->group(function() {
        Route::get('portfolio/index', 'index')->name('portfolio.index');
        Route::get('portfolio/create', 'create')->name('portfolio.create');
        Route::post('portfolio/store','store')->name('portfolio.store');
        Route::get('portfolio/edit/{id}', 'edit')->name('portfolio.edit');
        Route::put('portfolio/update/{id}', 'update')->name('portfolio.update');
        Route::delete('portfolio/{id}', 'destroy')->name('portfolio.destroy');
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
