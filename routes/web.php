<?php

use App\Livewire\CropSolutionsManagement;
use App\Livewire\EventManagement;
use App\Livewire\NewsManagement;
use App\Livewire\RoleManagement;
use App\Livewire\TutorialManagement;
use App\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\News;
use App\Models\Tutorial;
use App\Models\CropSolution;
use Illuminate\Http\Request;
use App\Models\Event;

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
//Route::view('/events','pages.events')->name('events');
//Route::view('/news','pages.news')->name('news');
//Route::view('/solutions','pages.solutions')->name('solutions');
//Route::view('/tutorial','pages.tutorial')->name('tutorial');
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

// 1. Tutorial List Page
Route::get('/tutorial', function () {
    $tutorials = Tutorial::with('user')->latest()->get();
    return view('pages.tutorial', ['tutorials' => $tutorials]);
})->name('tutorial');

// 2. Single Tutorial View
Route::get('/tutorial/{tutorial}', function (Tutorial $tutorial) {
    return view('pages.tutorial-single', ['tutorial' => $tutorial]);
})->name('tutorial.show');

// 1. Solutions List Page
Route::get('/solutions', function (Request $request) {
    // 1. Start the query
    $query = CropSolution::with('user')->latest();

    // 2. Apply Filters if selected
    if ($request->filled('crop')) {
        $query->where('crop_name', $request->crop);
    }

    if ($request->filled('type')) {
        $query->where('problem_type', $request->type);
    }

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('problem_name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    // 3. Fetch Results
    $solutions = $query->get();

    // 4. Get Unique options for Dropdowns (to avoid manual typing)
    $crops = CropSolution::select('crop_name')->distinct()->pluck('crop_name');
    $types = CropSolution::select('problem_type')->distinct()->pluck('problem_type');

    return view('pages.solutions', [
        'solutions' => $solutions,
        'crops' => $crops,
        'types' => $types
    ]);
})->name('solutions');

// 2. Single Solution View
Route::get('/solutions/{solution}', function (CropSolution $solution) {
    return view('pages.solutions-single', ['solution' => $solution]);
})->name('solutions.show');


// 1. Events List
// routes/web.php
Route::get('/events', function () {
    $events = Event::orderBy('start_time', 'asc')->get();

    return view('pages.events', ['events' => $events]);
})->name('events');

// 2. Single Event Details
Route::get('/events/{event}', function (Event $event) {
    return view('pages.events-single', ['event' => $event]);
})->name('events.show');
