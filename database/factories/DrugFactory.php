<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drug>
 */
class DrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->word(),
            'image_url' => function (array $attributes) {
                return 'https://placehold.co/600x400?text=obat+' . $attributes['nama'];
            },
            'kegunaan' => fake()->realText(64),
            'indikasi' => fake()->realText(64),
            'jenis' => fake()->word(1),
            'dosis' => fake()->sentence(3),
            'harga' => fake()->randomNumber(8),
        ];
    }
}
