<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'entreprise_id',
        'employer_id',
        'mois',
        'annee',
        'motif',
    ];
}
