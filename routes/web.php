<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\NewRevisorController;
use App\Http\Controllers\AnnouncementController;

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
//HOMEPAGE

Route::get('/', [PublicController::class, 'welcome'])->name('homepage');

//PUBLIC ANNUNCI
Route::get('/category/{title}/{id}/announcements', [PublicController::class, 'filterCategory'])->name('announcements.category');


Auth::routes();
//LOG IN
Route::get('/home',[HomeController::class, 'index'])->name('home');


//ENTITA' CRUD ANNUNCI
Route::get('/announcements/index', [AnnouncementController::class, 'index'])->name('announcements.index');

Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::post('/announcements/store', [AnnouncementController::class, 'store'])->name('announcements.store');

Route::get('/announcements/edit/{announcement}', [AnnouncementController::class, 'edit'])->name('announcements.edit');
Route::put('/announcements/update/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');

Route::delete('/announcements/destroy/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
//Route Images
Route::post('/announcements/images/upload', [AnnouncementController::class, 'uploadImage'])->name('announcements.images.upload');
Route::delete('/announcements/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcements.images.remove');

Route::get('/announcements/images', [AnnouncementController::class, 'getImage'])->name('announcements.images');

Route::get('/announcements/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');




//revisor section routes
Route::get('/revisor/index',[RevisorController::class, 'index'])->name('revisor.index');

Route::post('/revisor/announcements/{id}/accept',[RevisorController::class, 'accept'])->name('revisor.accept');

Route::post('/revisor/announcements/{id}/reject',[RevisorController::class, 'reject'])->name('revisor.reject');

Route::post('/revisor/announcements/{id}/redo',[RevisorController::class, 'redo'])->name('revisor.redo');

Route::get('/revisor/bin',[RevisorController::class, 'bin'])->name('revisor.bin');

Route::delete('/revisor/announcements/{id}/delete',[RevisorController::class, 'destroy'])->name('revisor.destroy');


//ROUTE SEARCH

Route::get('/search',[PublicController::class, 'search'])->name('search');

//New revisor request
Route::get('/revisor/new',[NewRevisorController::class, 'create'])->name('revisor.create');
Route::post('/revisor/mail',[NewRevisorController::class, 'accept'])->name('revisor.mail');

Route::get('/revisor/maker',[NewRevisorController::class, 'maker'])->name('revisor.maker');
Route::post('/revisor/make',[NewRevisorController::class, 'make'])->name('revisor.make');


//multy lang
Route::post('/locale/{locale}',[PublicController::class, 'locale'])->name('locale');

