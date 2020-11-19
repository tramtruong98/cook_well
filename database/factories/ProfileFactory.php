<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1,100),
            'avatar' => 'https://picsum.photos/530/591',
            'manifesto' => $this->faker->text,
            'gender' => (bool)rand(0,1),
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
