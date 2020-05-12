<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\NewExerciseRoutine;
use App\ExerciseRoutine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ExerciseRoutineController
 */
class ExerciseRoutineControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('exerciseroutine.create'));

        $response->assertOk();
        $response->assertViewIs('ExerciseRoutine.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ExerciseRoutineController::class,
            'store',
            \App\Http\Requests\ExerciseRoutineStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $exercise_id = $this->faker->randomDigitNotNull;
        $routine_id = $this->faker->randomDigitNotNull;
        $sets = $this->faker->word;
        $reps = $this->faker->word;
        $weight = $this->faker->word;

        Event::fake();

        $response = $this->post(route('exerciseroutine.store'), [
            'exercise_id' => $exercise_id,
            'routine_id' => $routine_id,
            'sets' => $sets,
            'reps' => $reps,
            'weight' => $weight,
        ]);

        $exerciseRoutines = ExerciseRoutine::query()
            ->where('exercise_id', $exercise_id)
            ->where('routine_id', $routine_id)
            ->where('sets', $sets)
            ->where('reps', $reps)
            ->where('weight', $weight)
            ->get();
        $this->assertCount(1, $exerciseRoutines);
        $exerciseRoutine = $exerciseRoutines->first();

        $response->assertRedirect(route('ExerciseRoutine.create'));
        $response->assertSessionHas('message', $message);

        Event::assertDispatched(NewExerciseRoutine::class, function ($event) use ($ExerciseRoutine) {
            return $event->ExerciseRoutine->is($ExerciseRoutine);
        });
    }
}
