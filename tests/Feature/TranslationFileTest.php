<?php

namespace Tests\Feature;

use Tests\TestCase;

class TranslationFileTest extends TestCase
{
    public function testAccessingMealsTranslations()
    {
        // Load the JSON translation file
        $jsonFilePath = resource_path('lang/fr/fr.json');
        $jsonContents = file_get_contents($jsonFilePath);
        $translations = json_decode($jsonContents, true);

        // Assert that the JSON file is loaded successfully
        $this->assertNotNull($translations);

        // Access specific titles and descriptions
        $janjetinaTitle = $translations['meals']['janjetina_s_krumpirom']['title'];
        $janjetinaDescription = $translations['meals']['janjetina_s_krumpirom']['description'];

        dd($janjetinaTitle);

        // Add assertions to check the retrieved values
        //$this->assertEquals('Lamb with Potatoes', $janjetinaTitle);
        //$this->assertEquals('Roasted lamb with fried potatoes and vegetables.', $janjetinaDescription);

        // Repeat the above steps for other meal translations as needed
    }
}
