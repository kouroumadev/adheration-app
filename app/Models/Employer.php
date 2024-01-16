<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'nom_employer',
        'prenom_employer',
        'sexe_employer',
        'matricule',
        'entreprise_id',
        'adresse_employer',
        'email_employer',
        'n_immatriculation',
        'date_naissance_employer',
        'lieu_naissance_employer',
        'nationalite',
        'prenom_pere',
        'prenom_mere',
        'nom_pere',
        'nom_mere',
        'situation_matrimoniale',
        'profession',
        'n_cin',
        'date_del_cin',
        'lieu_del_cin',
        'n_acte_naissance',
        'date_del_acte_naissance',
        'lieu_del_acte_naissance',
        'etat_employer',
        'date_embauche',
        'date_immatriculation',
        'liberer',
    ];

    public function entreprises(){

        return $this->belongsTo(Entreprise::class,'entreprise_id','id');
    }
}
