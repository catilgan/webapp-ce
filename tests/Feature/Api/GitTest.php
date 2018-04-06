<?php

namespace Tests\Feature\Api;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GitTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->user = factory(User::class)->create();
        $this->project = factory(Project::class)->create();
        $this->repo = $this->createEmptyBareRepository($this->user->name, $this->project->name);
    }

    /** @test */
    public function check_if_repository_was_created()
    {
        $this->assertTrue($this->repo->isBare());
    }

    /** @test */
    public function api_can_read_branches_from_repository()
    {
        $response = $this->actingAs($this->user)->get('/api/projects/' . $this->project->id . '/branches');
        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_read_tags_from_repository()
    {
        $response = $this->actingAs($this->user)->get('/api/projects/' . $this->project->id . '/tags');
        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_read_commits_from_repository()
    {
        $response = $this->actingAs($this->user)->get('/api/projects/' . $this->project->id . '/commits');
        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_read_files_from_repository()
    {
        $response = $this->actingAs($this->user)->get('/api/projects/' . $this->project->id . '/tree');
        $response->assertStatus(200);
    }
}
