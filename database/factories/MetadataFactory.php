<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Metadata;
use App\Models\User;

class MetadataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Metadata::class;

    public function definition()
    {
        return [
            'name'     => $this->faker->randomElement(['Favourite Movie', 'Height', 'City', 'Favourite beer']),
            'value' => $this->faker->randomElement(['Titanic', '178cm', 'Budapest', 'Heineken']),
            'user_id'     => $this->faker->numberBetween($min = 1, $max = count (User::all())),
        ];
    }
}
