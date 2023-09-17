<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ingredients = [
            ['ingredient' => 'Piletina', 'slug' => 'slug-piletina'],
            ['ingredient' => 'Povrće', 'slug' => 'slug-povrce'],
            ['ingredient' => 'Losos', 'slug' => 'slug-losos'],
            ['ingredient' => 'Bijeli grah', 'slug' => 'slug-bijeli-grah'],
            ['ingredient' => 'Šunka', 'slug' => 'slug-sunka'],
            ['ingredient' => 'Gljive', 'slug' => 'slug-gljive'],
            ['ingredient' => 'Sir', 'slug' => 'slug-sir'],
            ['ingredient' => 'Maslac', 'slug' => 'slug-maslac'],
            ['ingredient' => 'Tjestenina', 'slug' => 'slug-tjestenina'],
            ['ingredient' => 'Vrhnje', 'slug' => 'slug-vrhnje'],
            ['ingredient' => 'Svinjske rebra', 'slug' => 'slug-svinjske-rebra'],
            ['ingredient' => 'BBQ umak', 'slug' => 'slug-bbq-umak'],
            ['ingredient' => 'Krastavac', 'slug' => 'slug-krastavac'],
            ['ingredient' => 'Rajčica', 'slug' => 'slug-rajcica'],
            ['ingredient' => 'Feta sir', 'slug' => 'slug-feta-sir'],
            ['ingredient' => 'Taco čips', 'slug' => 'slug-taco-cips'],
            ['ingredient' => 'Piletina', 'slug' => 'slug-piletina'],
            ['ingredient' => 'Indijske začine', 'slug' => 'slug-indijske-zacine'],
            ['ingredient' => 'Kinoa', 'slug' => 'slug-kinoa'],
            ['ingredient' => 'Limunski preljev', 'slug' => 'slug-limunski-preljev'],
            ['ingredient' => 'Palačinke', 'slug' => 'slug-palacinke'],
            ['ingredient' => 'Javorov sirup', 'slug' => 'slug-javorov-sirup'],
            ['ingredient' => 'Tofu', 'slug' => 'slug-tofu'],
            ['ingredient' => 'Soja umak', 'slug' => 'slug-soja-umak'],
            ['ingredient' => 'Lignje', 'slug' => 'slug-lignje'],
            ['ingredient' => 'Maslinovo ulje', 'slug' => 'slug-maslinovo-ulje'],
            ['ingredient' => 'Bazilski pesto', 'slug' => 'slug-bazilski-pesto'],
            ['ingredient' => 'Borovnice', 'slug' => 'slug-borovnice'],
            ['ingredient' => 'Pileća juha', 'slug' => 'slug-pileca-juha'],
            ['ingredient' => 'Jaja', 'slug' => 'slug-jaja'],
            ['ingredient' => 'Mljeveno meso', 'slug' => 'slug-mljeveno-meso'],
            ['ingredient' => 'Začini', 'slug' => 'slug-zacini'],
            ['ingredient' => 'Turski kruh', 'slug' => 'slug-turski-kruh'],
            ['ingredient' => 'Riblji fileti', 'slug' => 'slug-riblji-fileti'],
            ['ingredient' => 'Taco školjke', 'slug' => 'slug-taco-skoljke'],
            ['ingredient' => 'Curry umak', 'slug' => 'slug-curry-umak'],
            ['ingredient' => 'Riža', 'slug' => 'slug-riza'],
            ['ingredient' => 'Povrtni burger', 'slug' => 'slug-povrtni-burger'],
            ['ingredient' => 'Avokado', 'slug' => 'slug-avokado'],
            ['ingredient' => 'Zelena salata', 'slug' => 'slug-zelena-salata'],
            ['ingredient' => 'Krutoni', 'slug' => 'slug-krutoni'],
            ['ingredient' => 'Parmezan', 'slug' => 'slug-parmezan'],
        ];

        $randomIngredientsData = $this->faker->randomElement($ingredients);

        return [
            'ingredient' => $randomIngredientsData['ingredient'],
            'slug' => $randomIngredientsData['slug'],
        ];
    }
}
