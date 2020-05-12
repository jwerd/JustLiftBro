<?php

namespace Tests\Feature\Http\Controllers;

use App\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ExerciseController
 */
class ExerciseControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $exercises = factory(Exercise::class, 3)->create();

        $response = $this->get(route('exercise.index'));

        $response->assertOk();
        $response->assertViewIs('exercise.index');
        $response->assertViewHas('exercises');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('exercise.create'));

        $response->assertOk();
        $response->assertViewIs('exercise.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ExerciseController::class,
            'store',
            \App\Http\Requests\ExerciseStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $exercise = $this->faker->word;

        $response = $this->post(route('exercise.store'), [
            'exercise' => $exercise,
        ]);

        $exercises = Exercise::query()
            ->where('exercise', $exercise)
            ->get();
        $this->assertCount(1, $exercises);
        $exercise = $exercises->first();

        $response->assertRedirect(route('exercise.index'));
        $response->assertSessionHas('exercise.id', $exercise->id);
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $exercise = factory(Exercise::class)->create();

        $response = $this->get(route('exercise.edit', $exercise));

        $response->assertOk();
        $response->assertViewIs('exercise.edit');
        $response->assertViewHas('exercise');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ExerciseController::class,
            'update',
            \App\Http\Requests\ExerciseUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $exercise = factory(Exercise::class)->create();
        $exercise = $this->faker->word;

        $response = $this->put(route('exercise.update', $exercise), [
            'exercise' => $exercise,
        ]);

        $response->assertRedirect(route('exercise.index'));
        $response->assertSessionHas('exercise.id', $exercise->id);
    }
}
