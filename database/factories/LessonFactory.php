<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Lesson '. $this->faker->text($maxNbChars = 20),
            'lesson_fee' => random_int(1,99),
            'is_enabled' => (bool)random_int(0, 1)
        ];
    }
}
