<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'category',
        'name',
        'name_en',
        'description',
        'description_en',
        'price',
        'image' // Ajouté pour permettre l'enregistrement du chemin de la photo
    ];
}
