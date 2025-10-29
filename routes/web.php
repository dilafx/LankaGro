<?php

use App\Livewire\CropSolutionsManagement;
use App\Livewire\EventManagement;
use App\Livewire\NewsManagement;
use App\Livewire\RoleManagement;
use App\Livewire\TutorialManagement;
use App\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::view('admin/dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');


    Route::get('/user-management',UserManagement::class)->name('user.index');
    Route::get('/role-management',RoleManagement::class)->name('role.manager');
    Route::get('/news-management',NewsManagement::class)->name('news.manager');
    Route::get('/event-management',EventManagement::class)->name('event.manager');
    Route::get('/tutorial-management',TutorialManagement::class)->name('tutorial.manager');
    Route::get('/crop-solutions-management',CropSolutionsManagement::class)->name('crop.solution.manager');



    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
