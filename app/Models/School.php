<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'address',
        'total_students',
        'phone',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
