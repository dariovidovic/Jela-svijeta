<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $fillable = ['ingredient', 'slug'];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function translations()
    {
        return $this->hasMany(IngredientTranslation::class);
    }
}
