<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['title', 'slug'];

    public function meal() {

        return $this->belongsTo(Meal::class);
    }

    public function translations(){

        return $this->hasMany(CategoryTranslation::class);

    }
}
