<?php

namespace Tests\Feature\Livewire;

use App\Livewire\EventManagement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class EventManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create necessary permissions for the test
        Permission::create(['name' => 'event.view']);
        Permission::create(['name' => 'event.create']);
    }

    public function test_event_management_renders_successfully()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('event.view');

        Livewire::actingAs($user)
            ->test(EventManagement::class)
            ->assertStatus(200)
            ->assertSee('Event Management');
    }

    public function test_admin_can_create_new_event()
    {
        $user = User::factory()->create();
        $user->givePermissionTo(['event.view', 'event.create']);

        Livewire::actingAs($user)
            ->test(EventManagement::class)
            ->set('title', 'Smart Agriculture Summit')
            ->set('description', 'A test description for the summit.')
            ->set('startTime', now()->addDays(5)->format('Y-m-d\TH:i'))
            ->set('endTime', now()->addDays(5)->addHours(3)->format('Y-m-d\TH:i'))
            ->set('location', 'BMICH, Colombo')
            ->set('capacity', 150)
            ->call('save')
            ->assertHasNoErrors();

        // Check if the event was actually saved to the database
        $this->assertDatabaseHas('events', [
            'title' => 'Smart Agriculture Summit',
            'location' => 'BMICH, Colombo',
            'capacity' => 150
        ]);
    }
}
