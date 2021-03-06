<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function access_is_restricted_to_admins()
    {
        $test_data = [
            ['protocol' => 'GET', 'route' => route('admin.home')],
        ];

        foreach ($test_data as $test) {
            $this->actingAsUser()
                ->call($test['protocol'], $test['route'])
                ->assertForbidden();
        }
    }

    /** @test */
    public function index_returns_proper_content()
    {
        $this->actingAsAdmin()
            ->get(route('admin.home'))
            ->assertOK()
            ->assertViewIs('admin.dashboard.index')
            ->assertViewHasAll([
                'members_count',
                'questions_count',
                'badges_count',
                'levels_count',
                'latest_questions',
                'latest_users',
            ]);
    }
}
