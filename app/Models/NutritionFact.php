<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionFact extends Model
{
    protected $fillable = [
        'menu_id',
        'calories',
        'protein',
        'carbohydrates',
        'fats',
        'fiber',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
