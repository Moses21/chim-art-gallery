<?php

use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'] )->name('home');

//public routes

Route::get('/about', fn () => Inertia::render('About'))->name('about');
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::get('/exhibition', [App\Http\Controllers\ExhibitionController::class, 'index'])->name('exhibition.index');

Route::get('my-work/{id}',[App\Http\Controllers\ItemsController::class,'show'])->name('items.show');

Route::get("/wishlist", fn () =>  response()->json(auth()->user()->wishlist));

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    //  payment routes
    Route::get("/changu-webhook",[PaymentsController::class,"handleWebhook"])->name('changu-webhook');
    Route::get('/changu-callback', [PaymentsController::class, 'callback'])->name('changu.callback');

    // add to wishlists routes

    Route::post('/wishlist', [App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist.store');


    // user management routes

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
