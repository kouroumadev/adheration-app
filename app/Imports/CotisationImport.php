<?php

namespace App\Imports;

use App\Models\Cotisation;
use App\Models\Employer;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Auth;
use Redirect;

class CotisationImport implements ToModel, WithValidation, WithHeadingRow
{

    public function model(array $row)
    {


        $employee = Employer::where('matricule',$row['employer_matricule'])->select('id','salaire_brut')->get()->first();

        $salaire = (int)$employee->salaire_brut;
        if($salaire > 0 && $salaire <= 550000){
            $cota = (550000 * 23)/100;
            $soumis = 550000;
        } else if($salaire > 550000 && $salaire <= 2500000){
            $cota = ($salaire * 23)/100;
            $soumis = $salaire;
        } else {
            $cota = (2500000 * 23)/100;
            $soumis = 2500000;
        }
        // dd($employee);

        return new Cotisation([

            'entreprise_id' => Auth::user()->entreprise_id,
            'parent_id' => $row['parent_id'],
            'employer_id' => $employee->id,
            'jour_declare' => $row['jour_declare'],
            'periode_debut' => $row['periode_debut'],
            'periode_fin' => $row['periode_fin'],
            'salaire_brute' => $employee->salaire_brut,
            'salaire_soumis' => $soumis,
            'montant_cotise' => $cota,

        ]);
    }

    public function rules(): array
    {
        $emp_id = Employer::pluck('matricule')->toArray();
        return [
            'employer_matricule' => ['required',Rule::in($emp_id)],
            'jour_declare' => 'required',
            'periode_debut' => 'required',

            // 'email' => Rule::in(['patrick@maatwebsite.nl']),
        ];
    }


    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            'employer_matricule' => 'Employer Matricule',
            'parent_id' => 'Parent ID',
            'jour_declare' => 'Jour Declare',
            'periode_debut' => 'Periode Debut',
            'periode_fin' => 'Periode Fin'
        ];
    }
}
