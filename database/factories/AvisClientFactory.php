<?php

namespace Database\Factories;

use App\Models\AvisClient;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvisClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AvisClient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->name(),
            'pseudo' => $this->faker->unique()->safeEmail(),
            'note' => $this->faker->randomDigitNot(5),
            'comment' => $this->faker->text($maxNbChars = 200),
            'picture' => $this->faker->imageUrl($width = 640, $height = 480),
            'date' => $this->dateTime($max = 'now', $timezone = null), // DateTime('2008-04-25 08:37:17', 'UTC')

        ];
    }
}
