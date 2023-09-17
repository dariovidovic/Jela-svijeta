<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Meal;
use App\Models\MealTranslation;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $meals = [
            ['title' => 'Piletina s povrćem', 'description' => 'Piletina sa svježim povrćem i umakom po izboru.'],
            ['title' => 'Losos s bijelim grahom', 'description' => 'Pecite losos s bijelim grahom i maslacem.'],
            ['title' => 'Pica s šunkom i gljivama', 'description' => 'Klasika - pizza s šunkom i gljivama.'],
            ['title' => 'Tjestenina Alfredo', 'description' => 'Tjestenina u kremastom umaku od sira i maslaca.'],
            ['title' => 'Svinjska rebra s BBQ umakom', 'description' => 'Svinjska rebra pečena s aromatičnim BBQ umakom.'],
            ['title' => 'Grčka salata', 'description' => 'Svježa grčka salata s krastavcima, rajčicom i feta sirom.'],
            ['title' => 'Taco salata', 'description' => 'Zdrava i ukusna taco salata s hrskavim nacho čipsom.'],
            ['title' => 'Tikka masala s piletinom', 'description' => 'Indijska tikka masala s sočnim komadima piletine.'],
            ['title' => 'Quinoa salata', 'description' => 'Hranjiva quinoa salata s povrćem i preljevom od limuna.'],
            ['title' => 'Pancakes s javorovim sirupom', 'description' => 'Pahuljaste pancakes prelivene javorovim sirupom.'],
            ['title' => 'Tofu stir-fry', 'description' => 'Brzi tofu stir-fry s povrćem i sojinim umakom.'],
            ['title' => 'Lignje na žaru', 'description' => 'Lignje pečene na roštilju s maslinovim uljem.'],
            ['title' => 'Tjestenina s pestom', 'description' => 'Tjestenina s aromatičnim pestom od bosiljka i pinjola.'],
            ['title' => 'Kineska juha s piletinom', 'description' => 'Klasična kineska juha s piletinom i povrćem.'],
            ['title' => 'Karbonara s pancetom', 'description' => 'Tjestenina carbonara s hrskavom pancetom i jajima.'],
            ['title' => 'Turski kebabi', 'description' => 'Sočni turski kebabi sa začinskim umakom.'],
            ['title' => 'Riblji tacosi', 'description' => 'Tacosi s koricama od ribe i svježim povrćem.'],
            ['title' => 'Pileći curry', 'description' => 'Aromatični pileći curry s rižom.'],
            ['title' => 'Vegetarijanski burgeri', 'description' => 'Hrskavi vegetarijanski burgeri s umakom od avokada.'],
            ['title' => 'Cezar salata', 'description' => 'Klasična Cezar salata s krušnim krutonima i parmezanom.'],
        ];

        $randomMealData = $this->faker->randomElement($meals);

        return [
            'title' => $randomMealData['title'],
            'description' => $randomMealData['description'],
            'status' => 'created',
        ];
       
    }

}
