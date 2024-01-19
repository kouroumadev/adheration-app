<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssureParent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom_pere',
        'prenom_pere',
        'date_naissance_pere',
        'etat_pere',
        'nom_mere',
        'prenom_mere',
        'date_naissance_mere',
        'lieu_naissance_mere',
        'etat_mere',
        'employer_id'

    ];
}
