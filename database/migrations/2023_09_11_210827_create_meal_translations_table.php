<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('meal_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_id');

            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');

            $table->unique(['meal_id','locale']);
            $table->foreign('meal_id')->references('id')->on('meals');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_translations');
    }
};
