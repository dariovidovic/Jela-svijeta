<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            ['title' => 'Brzo & Jednostavno', 'slug' => 'slug-brzo-jednostavno'],
            ['title' => 'Jelo za Udobnost', 'slug' => 'slug-jelo-za-udobnost'],
            ['title' => 'Egzotični Okusi', 'slug' => 'slug-egzoticni-okusi'],
            ['title' => 'Pikantne Kreacije', 'slug' => 'slug-pikantne-kreacije'],
            ['title' => 'Omiljeni obroci za obitelj', 'slug' => 'slug-omiljeni-obroci-za-obitelj'],
        ];

        $randomTagData = $this->faker->randomElement($tags);

        return [
            'title' => $randomTagData['title'],
            'slug' => $randomTagData['slug'],
        ];
    }
}
