<?php

namespace Tests\Feature;

use App\Cells;
use App\Columns;
use App\Project;
use App\Rows;
use App\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function tesWellcome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Testing the application is working.
     *
     * @return void
     */
    public function test_application_is_working()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_relationships_are_defined()
    {

        $this->assertInstanceOf(BelongsTo::class, (new \App\Cells())->columns());
        $this->assertInstanceOf(BelongsTo::class, (new \App\Cells())->rows());

        $this->assertInstanceOf(BelongsTo::class, (new \App\Rows())->table());
        $this->assertInstanceOf(BelongsTo::class, (new \App\Columns())->table());
        $this->assertInstanceOf(BelongsTo::class, (new \App\Table())->project());
        $this->assertInstanceOf(HasMany::class, (new \App\Project())->tables());
    }

    public function test_can_create_project()
    {
        $request = [
            'name'    => $this->faker->unique()->word(),
        ];

        $project = factory(Project::class)->create($request);

        $this->assertTrue(true);
    }

    public function test_can_create_table()
    {
        factory(Table::class)->create([
            'name'          => $this->faker->unique()->word(),
            'project_id'    => factory(Project::class)->create()->id
        ]);

        $this->assertTrue(true);
    }

    public function test_can_create_cells_in_tables()
    {
        factory(Cells::class)->create([
            'row_id'        => factory(Rows::class)->create()->id,
            'column_id'     => factory(Columns::class)->create()->id,
            'description'   => $this->faker->paragraph
        ]);

        $this->assertTrue(true);
    }
}
