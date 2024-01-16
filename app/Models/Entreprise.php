<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
            'id',
            'num_agrement' ,
            'raison_sociale',
            'num_impot' ,
            'activite_principale',
            'quartier_entreprise',
            'commune_entreprise',
            'ville_entreprise',
            'boite_postale'
    ];
}
