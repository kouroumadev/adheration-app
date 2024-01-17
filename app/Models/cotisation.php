<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'entreprise_id',
        'parent_id',
        'employer_id',
        'jour_declare',
        'periode_debut',
        'periode_fin',
        'salaire_brut',
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
        return $this->hasMany(cotisation::class,'parent_id')->with(['children']);
    }
}
