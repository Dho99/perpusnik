<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(5),
            'penulis' => fake()->name(),
            'penerbit' => fake()->name(),
            'thumbnail' => fake()->imageUrl(640, 480, 'animals', true),
            'categoryId' => mt_rand(1,4),
            'views' => mt_rand(0000, 9999)*10,
            'tahunTerbit' => fake()->dateTimeThisCentury('+8 years')
        ];
    }
}
