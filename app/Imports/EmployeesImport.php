<?php

namespace App\Imports;

use App\Models\Employer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Auth;
use Carbon\Carbon;

class EmployeesImport implements ToModel, WithValidation, WithHeadingRow
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
     public function rules(): array
    {
        return [
            'nom_employer' => 'required',
            'prenom_employer' => 'required',
            'matricule' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            'nom_employer' => 'Nom Employer',
            'prenom_employer' => 'Prenom Employer',
            'sexe_employer' => 'Sexe Employer',
            'matricule' => 'Matricule',
            'entreprise_id' => 'Entreprise Id',
            'adresse_employer' => 'Adresse Employer',
            'email_employer' => 'Email Employer',
            'n_immatriculation' => 'N Immatriculation',
            'date_naissance_employer' => 'Date Naissance Employer',
            'lieu_naissance_employer' => 'Lieu Naissance Employer',
            'nationalite' => 'Nationalite',
            'prenom_pere' => 'Prenom Pere',
            'prenom_mere' => 'Prenom Mere',
            'nom_pere' => 'Nom Pere',
            'nom_mere' => 'Nom Mere',
            'situation_matrimoniale' => 'Situation Matrimoniale',
            'profession' => 'Profession',
            'n_cin' => 'N Cin',
            'date_del_cin' => 'Date Del Cin',
            'lieu_del_cin' => 'Lieu Del Cin',
            'n_acte_naissance' => 'N Acte Naissance',
            'date_del_acte_naissance' => 'Date Del Acte Naissance',
            'lieu_del_acte_naissance' => 'Dieu Del Acte Naissance',
            'etat_employer' => 'Etat Employer',
            'date_embauche' => 'Date Embauche',
            'date_immatriculation' => 'Date Immatriculation',
            'liberer' => 'Liberer',
        ];
    }
}
