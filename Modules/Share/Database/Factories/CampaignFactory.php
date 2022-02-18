<?php

namespace Modules\Share\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Marketing\Models\Campaign;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->name(),
            'status' => Campaign::STATUS_IN_QUEUE,
            'start_date' => '2020-02-25',
            'end_date' => '2020-03-25',
            'type' => Campaign::TYPE_EMAIL,
            'type_money' => Campaign::TYPE_MONEY_DOLLAR,
            'count_email_readed' => $this->faker->numerify('######'),
            'budget' => $this->faker->numerify('######'),
            'real_cost' => $this->faker->numerify('######'),
            'expected_income' => $this->faker->numerify('######'),
            'expected_cost' => $this->faker->numerify('######'),
            'answer' => Campaign::ANSWER_POOR,
            'target' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
