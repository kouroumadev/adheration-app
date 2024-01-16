<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'prenom' ,
        'raison_sociale',
        'nom',
        'document_identite',
        'email',
        'commune_entreprise',
        'telephone_representant',
        'adresse_representant' ,


];
}
