<?php

use App\Livewire\CropSolutionsManagement;
use App\Livewire\EventManagement;
use App\Livewire\NewsManagement;
use App\Livewire\RoleManagement;
use App\Livewire\TutorialManagement;
use App\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Admin\Dashboard;
use App\Models\News;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('dashboard', App\Livewire\Admin\Dashboard::class)
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
Route::view('/calculator','pages.calculator')->name('calculator');
Route::view('/events','pages.events')->name('events');
//Route::view('/news','pages.news')->name('news');
Route::view('/solutions','pages.solutions')->name('solutions');
Route::view('/tutorial','pages.tutorial')->name('tutorial');
Route::view('/home','pages.home')->name('home');

// 1. News Index Page (List of all news)
Route::get('/news', function () {
    $news = News::where('status', 'published')->latest()->get();
    return view('pages.news', ['news' => $news]);
})->name('news');

// 2. Single News Article Page
Route::get('/news/{news}', function (News $news) {
    // Optional: Prevent viewing drafts
    if ($news->status !== 'published') {
        abort(404);
    }
    return view('pages.news-single', ['article' => $news]);
})->name('news.show');
