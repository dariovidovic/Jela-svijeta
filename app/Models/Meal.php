<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Meal extends Model
{
    use HasFactory;

    protected $table = 'meals';

    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    public function translations(){

        return $this->hasMany(MealTranslation::class);

    }

    public function ingredients(){

        return $this->hasMany(Ingredient::class);
    }

    public function category(){

        return $this->hasOne(Category::class);
    }

    public function tag(){

        return $this->hasOne(Tag::class);
    }

}
