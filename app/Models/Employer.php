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
        'email_employer',
        'n_immatriculation',
        'date_naissance_employer',
        'lieu_naissance_employer',
        'nationalite',
        'ville_employer',
        'quartier_employer',
        'commune_employer',
        'tel_employer',
        'situation_matrimoniale',
        'profession',
        'n_cin',
        'date_del_cin',
        'lieu_del_cin',
        'photo',
        'type_employer',
        'salaire_brut',
        'emploi_occupe',
        'date_embauche',
        'liberer'
    ];

    public function entreprises(){

        return $this->belongsTo(Entreprise::class,'entreprise_id','id');
    }
}
