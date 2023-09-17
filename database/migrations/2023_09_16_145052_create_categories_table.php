<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_id');

            $table->string('title');
            $table->string('slug');

            $table->timestamps();
            
            $table->foreign('meal_id')->references('id')->on('meals');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
