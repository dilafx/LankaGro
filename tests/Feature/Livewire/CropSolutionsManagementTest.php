<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CropSolutionsManagement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class CropSolutionsManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Permission::create(['name' => 'crop_solution.view']);
        Permission::create(['name' => 'crop_solution.create']);
    }

    public function test_crop_solutions_management_renders_successfully()
    {
        $admin = User::factory()->create();
        $admin->givePermissionTo('crop_solution.view');

        Livewire::actingAs($admin)
            ->test(CropSolutionsManagement::class)
            ->assertStatus(200)
            ->assertSee('Crop Solutions');
    }

    public function test_admin_can_add_a_new_crop_solution()
    {
        $admin = User::factory()->create();
        $admin->givePermissionTo(['crop_solution.view', 'crop_solution.create']);

        Livewire::actingAs($admin)
            ->test(CropSolutionsManagement::class)
            ->set('problem_name', 'Yellowing Paddy Leaves')
            ->set('crop_name', 'Rice')
            ->set('problem_type', 'Deficiency')
            ->set('description', 'Leaves are turning yellow at the tips.')
            ->set('solution', 'Apply Urea fertilizer at a rate of 50kg per acre.')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('crop_solutions', [
            'problem_name' => 'Yellowing Paddy Leaves',
            'crop_name' => 'Rice',
            'problem_type' => 'Deficiency'
        ]);
    }
}
