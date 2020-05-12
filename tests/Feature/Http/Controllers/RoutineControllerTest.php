<?php

namespace Tests\Feature\Http\Controllers;

use App\Routine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RoutineController
 */
class RoutineControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $routines = factory(Routine::class, 3)->create();

        $response = $this->get(route('routine.index'));

        $response->assertOk();
        $response->assertViewIs('routine.index');
        $response->assertViewHas('routines');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('routine.create'));

        $response->assertOk();
        $response->assertViewIs('routine.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RoutineController::class,
            'store',
            \App\Http\Requests\RoutineStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $routine = $this->faker->word;

        $response = $this->post(route('routine.store'), [
            'routine' => $routine,
        ]);

        $routines = Routine::query()
            ->where('routine', $routine)
            ->get();
        $this->assertCount(1, $routines);
        $routine = $routines->first();

        $response->assertRedirect(route('routine.index'));
        $response->assertSessionHas('routine.id', $routine->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $routine = factory(Routine::class)->create();

        $response = $this->get(route('routine.show', $routine));

        $response->assertOk();
        $response->assertViewIs('routine.show');
        $response->assertViewHas('routine');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $routine = factory(Routine::class)->create();

        $response = $this->get(route('routine.edit', $routine));

        $response->assertOk();
        $response->assertViewIs('routine.edit');
        $response->assertViewHas('routine');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RoutineController::class,
            'update',
            \App\Http\Requests\RoutineUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $routine = factory(Routine::class)->create();
        $routine = $this->faker->word;

        $response = $this->put(route('routine.update', $routine), [
            'routine' => $routine,
        ]);

        $response->assertRedirect(route('routine.index'));
        $response->assertSessionHas('routine.id', $routine->id);
    }
}
