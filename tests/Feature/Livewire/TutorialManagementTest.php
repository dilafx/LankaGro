<?php

namespace Tests\Feature\Livewire;

use App\Livewire\TutorialManagement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class TutorialManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create required permissions for testing
        Permission::create(['name' => 'tutorial.view']);
        Permission::create(['name' => 'tutorial.create']);
    }

    public function test_tutorial_management_renders_successfully()
    {
        $admin = User::factory()->create();
        $admin->givePermissionTo('tutorial.view');

        Livewire::actingAs($admin)
            ->test(TutorialManagement::class)
            ->assertStatus(200)
            ->assertSee('Tutorial Management');
    }

    public function test_admin_can_create_a_new_video_tutorial()
    {
        $admin = User::factory()->create();
        $admin->givePermissionTo(['tutorial.view', 'tutorial.create']);

        Livewire::actingAs($admin)
            ->test(TutorialManagement::class)
            ->set('title', 'How to prune tea bushes')
            ->set('description', 'A comprehensive video guide on proper tea pruning techniques.')
            ->set('contentType', 'video')
            ->set('contentLink', 'https://youtube.com/watch?v=example')
            ->call('save')
            ->assertHasNoErrors();

        // Verify the database has the exact tutorial we just created
        $this->assertDatabaseHas('tutorials', [
            'title' => 'How to prune tea bushes',
            'content_type' => 'video',
            'content_link' => 'https://youtube.com/watch?v=example',
            'user_id' => $admin->id
        ]);
    }
}
