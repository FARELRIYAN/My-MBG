<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'description',
        'date_served',
        'photo_url',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function nutritionFact()
    {
        return $this->hasOne(NutritionFact::class);
    }
}
