<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Meal;
use App\Models\MealTranslation;
use App\Models\CategoryTranslation;
use App\Models\TagTranslation;
use App\Models\IngredientTranslation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Lang;
use Database\Factories\MealFactory;
use Database\Factories\IngredientFactory;
use Database\Factories\CategoryFactory;
use Database\Factories\TagFactory;


class MealsSeeder extends Seeder
{
    public function run()
    {
        
        $titleMappings = [
            "Piletina s povrćem" => "piletina_s_povrcem",
            "Losos s bijelim grahom" => "losos_s_bijelim_grahom",
            "Pica s šunkom i gljivama" => "pica_s_sunkom_i_gljivama",
            "Tjestenina Alfredo" => "tjestenina_alfredo",
            "Svinjska rebra s BBQ umakom" => "svinjska_rebra_s_bbq_umakom",
            "Grčka salata" => "grcka_salata",
            "Taco salata" => "taco_salata",
            "Tikka masala s piletinom" => "tikka_masala_s_piletinom",
            "Quinoa salata" => "quinoa_salata",
            "Pancakes s javorovim sirupom" => "palacinke_s_javorovim_sirupom",
            "Tofu stir-fry" => "tofu_stir-fry",
            "Lignje na žaru" => "lignje_na_zaru",
            "Tjestenina s pestom" => "tjestenina_s_pestom",
            "Kineska juha s piletinom" => "kineska_juha_s_piletinom",
            "Karbonara s pancetom" => "pasta_carbonara_s_pancetom",
            "Turski kebabi" => "turski_kebabi",
            "Riblji tacosi" => "riblji_tacosi",
            "Pileći curry" => "pileci_curry",
            "Vegetarijanski burgeri" => "vegetarijanski_burgeri",
            "Cezar salata" => "cezar_salata",
        ];

        $categoryMappings = [
            "Jela od piletine" => "jela_od_piletine",
            "Morski specijaliteti" => "morski_specijaliteti",
            "Omiljeni talijanski recepti" => "omiljeni_talijanski_recepti",
            "Posebni roštilj specijaliteti" => "posebni_rostilj_specijaliteti",
            "Svježe salate" => "svjeze_salate",
        ];

        $tagMappings = [
            "Brzo & Jednostavno" => "brzo_i_jednostavno",
            "Jelo za Udobnost" => "jelo_za_udobnost",
            "Egzotični Okusi" => "egzoticni_okusi",
            "Pikantne Kreacije" => "pikantne_kreacije",
            "Omiljeni obroci za obitelj" => "omiljeni_obroci_za_obitelj",
        ];

        $ingredientMappings = [
            "Piletina" => "piletina",
            "Povrće" => "povrce",
            "Losos" => "losos",
            "Bijeli grah" => "bijeli_grah",
            "Šunka" => "sunka",
            "Gljive" => "gljive",
            "Sir" => "sir",
            "Maslac" => "maslac",
            "Tjestenina" => "tjestenina",
            "Vrhnje" => "vrhnje",
            "Svinjske rebra" => "svinjske_rebra",
            "BBQ umak" => "bbq_umak",
            "Krastavac" => "krastavac",
            "Rajčica" => "rajčica",
            "Feta sir" => "feta_sir",
            "Taco čips" => "taco_cips",
            "Indijske začine" => "indijske_zacine",
            "Kinoa" => "kinoa",
            "Limunski preljev" => "limunski_preljev",
            "Palačinke" => "palacinke",
            "Javorov sirup" => "javorov_sirup",
            "Tofu" => "tofu",
            "Soja umak" => "soja_umak",
            "Lignje" => "lignje",
            "Maslinovo ulje" => "maslinovo_ulje",
            "Bazilski pesto" => "bazilski_pesto",
            "Borovnice" => "borovnice",
            "Pileća juha" => "pileca_juha",
            "Jaja" => "jaja",
            "Mljeveno meso" => "mljeveno_meso",
            "Začini" => "zacini",
            "Turski kruh" => "turski_kruh",
            "Riblji fileti" => "riblji_fileti",
            "Taco školjke" => "taco_skoljke",
            "Curry umak" => "curry_umak",
            "Riža" => "riza",
            "Povrtni burger" => "povrtni_burger",
            "Avokado" => "avokado",
            "Zelena salata" => "zelena_salata",
            "Krutoni" => "krutoni",
            "Parmezan" => "parmezan",
        ];

        $languages = ['hr', 'en', 'fr', 'de'];

        
        $meal = MealFactory::new()->create();

        $category = CategoryFactory::new()->create([
            'meal_id' => $meal->id,
        ]);

        $tag = TagFactory::new()->create([
            'meal_id' => $meal->id,
        ]);

        $ingredients = IngredientFactory::new()->count(2)->create([
            'meal_id' => $meal->id, 
        ]);
        

        
        

        foreach ($languages as $locale) {
            
            $translations = $this->loadTranslationsFromJson($locale);
            
            if (isset($translations['meals'])) {
                $title = $meal->title;
                if (isset($titleMappings[$meal->title])) {
                    $title = $titleMappings[$meal->title];
                }
                $titleTranslation = $translations['meals'][$title]['title'];
                $descriptionTranslation = $translations['meals'][$title]['description'];

                $mealTranslation = new MealTranslation([
                    'locale' => $locale,
                    'title' => $titleTranslation,
                    'description' => $descriptionTranslation,
                ]);

                $meal->translations()->save($mealTranslation);
            }

            if (isset($translations['categories'])) {
                $categoryTitle = $category->title;
                if (isset($categoryMappings[$category->title])) {
                    $categoryTitle = $categoryMappings[$category->title];
                }
                $categoryTitleTranslation = $translations['categories'][$categoryTitle]['title'];
                $categorySlugTranslation = $translations['categories'][$categoryTitle]['slug'];
        
                $categoryTranslation = new CategoryTranslation([
                    'locale' => $locale,
                    'title' => $categoryTitleTranslation,
                    'slug' => $categorySlugTranslation,
                ]);
        
                $category->translations()->save($categoryTranslation);
            }


            if (isset($translations['tags'])) {
                $tagTitle = $tag->title;
                if (isset($tagMappings[$tag->title])) {
                    $tagTitle = $tagMappings[$tag->title];
                }
                $tagTitleTranslation = $translations['tags'][$tagTitle]['title'];
                $tagSlugTranslation = $translations['tags'][$tagTitle]['slug'];
        
                $tagTranslation = new TagTranslation([
                    'locale' => $locale,
                    'title' => $tagTitleTranslation,
                    'slug' => $tagSlugTranslation,
                ]);
        
                $tag->translations()->save($tagTranslation);
            }


            foreach ($ingredients as $ingredient) {
                    $translationKey = $ingredientMappings[$ingredient->ingredient]; 
                    $translationData = $translations['ingredients'][$translationKey];
            
                    $ingredientTranslation = new IngredientTranslation([
                        'locale' => $locale,
                        'ingredient' => $translationData['ingredient'],
                        'slug' => $translationData['slug'],
                    ]);
            
                    $ingredient->translations()->save($ingredientTranslation);
                
            }

        }

        
       

    }

    private function loadTranslationsFromJson($locale)
    {
        $jsonPath = resource_path("lang/$locale/$locale.json");
        return json_decode(File::get($jsonPath), true);
    }
}
