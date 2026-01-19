<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'category',
        'name',
        'name_en',
        'description',
        'description_en',
        'price'
    ];
}
