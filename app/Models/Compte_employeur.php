<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte_employeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'entreprise_id',
        'libele',
        'debit',
        'credit',
        'periode',
    ];
}
