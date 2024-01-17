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


        $employee_id = Employer::where('matricule',$row['employer_matricule'])->value('id');

        $salaire = (int)$row['salaire_brute'];
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
            'employer_id' => $employee_id,
            'jour_declare' => $row['jour_declare'],
            'periode_debut' => $row['periode_debut'],
            'periode_fin' => $row['periode_fin'],
            'salaire_brute' => $row['salaire_brute'],
            'salaire_soumis' => $soumis,
            'montant_cotise' => $cota,

        ]);
    }

    public function rules(): array
    {
        $emp_id = Employer::pluck('matricule')->toArray();
        return [
            'employer_matricule' => ['required',Rule::in($emp_id)],
            'salaire_brute' => 'required',

            // 'email' => Rule::in(['patrick@maatwebsite.nl']),
        ];
    }
}
