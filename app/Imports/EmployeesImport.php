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
            // 'adresse_employer' => $row['adresse_employer'],
            'email_employer' => $row['email_employer'],
            'n_immatriculation' => $row['n_immatriculation'],
            'date_naissance_employer' =>  $row['date_naissance_employer'],
            'lieu_naissance_employer' => $row['lieu_naissance_employer'],
            'pays_naissance_employer' => $row['pays_naissance_employer'],
            'nationalite' => $row['nationalite'],
            'ville_employer' => $row['ville_employer'],
            'quartier_employer' => $row['quartier_employer'],
            'commune_employer' => $row['commune_employer'],
            // 'prenom_pere' => $row['prenom_pere'],
            // 'prenom_mere' => $row['prenom_mere'],
            // 'nom_pere' => $row['nom_pere'],
            // 'nom_mere' => $row['nom_mere'],
            'tel_employer' => $row['tel_employer'],
            'situation_matrimoniale' => $row['situation_matrimoniale'],
            'profession' => $row['profession'],
            'n_cin' => $row['n_cin'],
            'date_del_cin' =>  $row['date_del_cin'],
            'type_employer' => $row['type_employer'],
            'lieu_del_cin' => $row['lieu_del_cin'],
            // 'n_acte_naissance' => $row['n_acte_naissance'],
            // 'date_del_acte_naissance' =>  $row['date_del_acte_naissance'],
            // 'lieu_del_acte_naissance' => $row['lieu_del_acte_naissance'],
            // 'etat_employer' => $row['etat_employer'],
            // 'date_embauche' =>  $row['date_embauche'],
            'date_embauche' =>  Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_embauche'])),
            // 'date_immatriculation' =>  $row['date_immatriculation'],
            'salaire_brut' =>  $row['salaire_brut'],
            'emploi_occupe' =>  $row['emploi_occupe'],
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
            'pays_naissance_employer' => 'Pays Naissance Employer',
            'nationalite' => 'Nationalite',
            'ville_employer' => 'Ville Employer',
            'quartier_employer' => 'Quartier Employer',
            'commune_employer' => 'Commune Employer',
            'tel_employer' => 'Tel Employer',
            'situation_matrimoniale' => 'Situation Matrimoniale',
            'profession' => 'Profession',
            'n_cin' => 'N Cin',
            'date_del_cin' => 'Date Del Cin',
            'lieu_del_cin' => 'Lieu Del Cin',
            'date_embauche' => 'Date Embauche',
            'salaire_brut' => 'Salaire Brut',
            'emploi_occupe' => 'Emploi Occupe',
            'liberer' => 'Liberer',
            'type_employer' => 'Type Employer',
        ];
    }
}
