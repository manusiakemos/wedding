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

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){
    Route::get('/home', App\Http\Livewire\Admin\Home::class)
        ->name('home');

    Route::get('/profile', App\Http\Livewire\Admin\ProfilePage::class)
        ->name('profile');

    Route::get('/user', App\Http\Livewire\User\UserPage::class)
        ->name('user');

    Route::get('/theme', App\Http\Livewire\Theme\ThemePage::class)
        ->name('theme');

    Route::get('/invitation', App\Http\Livewire\Invitation\InvitationPage::class)
        ->name('invitation');

    Route::get('/invitation/{invitation_id}', App\Http\Livewire\Invitation\Detail::class)
        ->name('invitation.detail');

    Route::get('/invitation-gallery/{id}', App\Http\Livewire\InvitationGallery\InvitationGalleryPage::class)
        ->name('invitation.gallery');
});

Route::prefix('laravel-filemanager')->middleware(['web', 'auth'])->group(function(){
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', [\App\Http\Controllers\WebController::class, 'welcome'])->name('welcome');
Route::get('/wedding/{invitationUrl?}', [\App\Http\Controllers\WebController::class, 'wedding'])->name('wedding');

