<?php

namespace Tests\Feature\Livewire;

use App\Livewire\NewsManagement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class NewsManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create necessary permissions for the test
        Permission::create(['name' => 'news.view']);
        Permission::create(['name' => 'news.create']);
    }

    public function test_news_management_renders_successfully()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('news.view');

        Livewire::actingAs($user)
            ->test(NewsManagement::class)
            ->assertStatus(200)
            ->assertSee('News Management');
    }

    public function test_admin_can_create_published_news_article()
    {
        $user = User::factory()->create();
        $user->givePermissionTo(['news.view', 'news.create']);

        Livewire::actingAs($user)
            ->test(NewsManagement::class)
            ->set('title', 'New Organic Fertilizer Subsidies')
            ->set('content', 'The government has announced new subsidies for organic farming...')
            ->set('status', 'published')
            ->call('save')
            ->assertHasNoErrors();

        // Verify it was written to the database
        $this->assertDatabaseHas('news', [
            'title' => 'New Organic Fertilizer Subsidies',
            'status' => 'published',
            'user_id' => $user->id
        ]);
    }
}
