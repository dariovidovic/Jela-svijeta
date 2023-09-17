<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mealCategories = [
            ['title' => 'Jela od piletine', 'slug' => 'slug-jela-od-piletine'],
            ['title' => 'Morski specijaliteti', 'slug' => 'slug-morski-specijaliteti'],
            ['title' => 'Omiljeni talijanski recepti', 'slug' => 'slug-omiljeni-talijanski-recepti'],
            ['title' => 'Posebni roštilj specijaliteti', 'slug' => 'slug-posebni-rostilj-specijaliteti'],
            ['title' => 'Svježe salate', 'slug' => 'slug-svjeze-salate'],
        ];

        $randomCategoryData = $this->faker->randomElement($mealCategories);

        return [
            'title' => $randomCategoryData['title'],
            'slug' => $randomCategoryData['slug'],
        ];
    }
}
