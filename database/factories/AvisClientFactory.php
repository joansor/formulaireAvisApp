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
            'email' => $this->faker->unique()->email(),
            'pseudo' => $this->faker->name(),
            'note' => $this->faker->numberBetween(0, 5),
            'comment' => $this->faker->text(),
            'picture' => $this->faker->imageUrl(640, 480, 'animals', true),
            'created_at' => $this->faker->unixTime(),
            'updated_at' => $this->faker->unixTime(),
        ];
    }
    public function run()
    {
        AvisClient::factory()
            ->count(10)
            ->create();
    }
}
