<?php

namespace Modules\Share\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Marketing\Models\Survey;

class SurveyFactory extends Factory
{
    protected $model = Survey::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->title,
            'status' => Survey::STATUS_INACTIVE,
            'body' => $this->faker->paragraph,
        ];
    }
}
