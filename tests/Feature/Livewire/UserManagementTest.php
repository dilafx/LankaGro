<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UserManagement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Permission::create(['name' => 'user.view']);
        Permission::create(['name' => 'user.create']);

        // Create a role to assign during user creation
        Role::create(['name' => 'Farmer']);
    }

    public function test_user_management_renders_successfully()
    {
        $admin = User::factory()->create();
        $admin->givePermissionTo('user.view');

        Livewire::actingAs($admin)
            ->test(UserManagement::class)
            ->assertStatus(200)
            ->assertSee('User Management');
    }

    public function test_admin_can_create_a_new_user_with_role()
    {
        $admin = User::factory()->create();
        $admin->givePermissionTo(['user.view', 'user.create']);

        Livewire::actingAs($admin)
            ->test(UserManagement::class)
            ->set('name', 'Kamal Perera')
            ->set('email', 'kamal@example.com')
            ->set('password', 'password123')
            ->set('selectedRoles', ['Farmer'])
            ->call('save')
            ->assertHasNoErrors();

        // Check if the user exists in the database
        $this->assertDatabaseHas('users', [
            'email' => 'kamal@example.com',
            'name' => 'Kamal Perera'
        ]);

        // Verify the role was assigned
        $createdUser = User::where('email', 'kamal@example.com')->first();
        $this->assertTrue($createdUser->hasRole('Farmer'));
    }
}
