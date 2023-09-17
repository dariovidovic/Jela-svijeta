<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = ['title', 'slug'];

    public function meal() {

        return $this->belongsTo(Meal::class);
    }

    public function translations(){

        return $this->hasMany(TagTranslation::class);

    }
}
