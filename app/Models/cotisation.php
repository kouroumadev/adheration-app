<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'entreprise_id',
        'parent_id',
        'employer_id',
        'jour_declare',
        'mois',
        'annee',
        'salaire_brute',
        'salaire_soumis',
        'montant_cotise',

    ];

    public function entreprises(){

        return $this->belongsTo(Entreprise::class,'entreprise_id','id');
    }
    public function employers(){

        return $this->belongsTo(Employer::class,'employer_id','id');
    }

    public function children(){
        return $this->hasMany(Cotisation::class,'parent_id')->with(['children']);
    }
}
