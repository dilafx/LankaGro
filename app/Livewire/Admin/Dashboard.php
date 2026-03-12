<?php

namespace App\Livewire\Admin;

use App\Models\CropSolution;
use App\Models\Event;
use App\Models\News;
use App\Models\Tutorial;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    // 2. The Variable
    public int $userCount = 0;
    public int $newsCount = 0;
    public int $eventCount = 0;
    public int $tutorialCount = 0;
    public int $cropSolutionCount = 0;

    public $recentNews;
    public $upcomingEvents;

    public function mount(): void
    {
        // 3. The Database Query
        $this->userCount = User::count();

        $this->newsCount = News::count();
        $this->eventCount = Event::count(); // Changed to count ALL events for the top metric card
        $this->tutorialCount = Tutorial::count();
        $this->cropSolutionCount = CropSolution::count();

        // Load Recent Activity Feeds
        $this->recentNews = News::with('user')
                                ->latest() // Orders by created_at descending
                                ->take(5)
                                ->get();

        // Get the 5 nearest upcoming events
        $this->upcomingEvents = Event::where('start_time', '>=', now())
                                    ->orderBy('start_time', 'asc') // Shows the soonest event first
                                    ->take(5)
                                    ->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
