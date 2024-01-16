<?php

namespace App\Imports;

use App\Models\Employer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
use Carbon\Carbon;

class EmployeesImport implements ToModel, WithHeadingRow
{
     public function model(array $row)
     {
          return new Employer([
            'nom_employer' => $row['nom_employer'],
            'prenom_employer' => $row['prenom_employer'],
            'sexe_employer' => $row['sexe_employer'],
            'matricule' => $row['matricule'],
            'entreprise_id' => Auth::user()->entreprise_id,
            'adresse_employer' => $row['adresse_employer'],
            'email_employer' => $row['email_employer'],
            'n_immatriculation' => $row['n_immatriculation'],
            'date_naissance_employer' =>  $row['date_naissance_employer'],
            'lieu_naissance_employer' => $row['lieu_naissance_employer'],
            'nationalite' => $row['nationalite'],
            'prenom_pere' => $row['prenom_pere'],
            'prenom_mere' => $row['prenom_mere'],
            'nom_pere' => $row['nom_pere'],
            'nom_mere' => $row['nom_mere'],
            'situation_matrimoniale' => $row['situation_matrimoniale'],
            'profession' => $row['profession'],
            'n_cin' => $row['n_cin'],
            'date_del_cin' =>  $row['date_del_cin'],
            'lieu_del_cin' => $row['lieu_del_cin'],
            'n_acte_naissance' => $row['n_acte_naissance'],
            'date_del_acte_naissance' =>  $row['date_del_acte_naissance'],
            'lieu_del_acte_naissance' => $row['lieu_del_acte_naissance'],
            'etat_employer' => $row['etat_employer'],
            'date_embauche' =>  $row['date_embauche'],
            'date_immatriculation' =>  $row['date_immatriculation'],
            'liberer' => $row['liberer'],

          ]);


     }

    //  public function headingRow(): int
    //  {
    //      return 2;
    //  }
}
