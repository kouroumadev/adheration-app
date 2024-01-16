<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\cotisation;
use App\Models\Entreprise;
use App\Imports\EmployeesImport;
use Auth;
use Hash;
use DB;
use PDF;
use Input;
use Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Alert;
use Redirect;

class EmployerController extends Controller
{
    public function MonEspace(){
        $n_immatriculation = Auth::user()->n_affiliation;
        $employer = Employer::with(['entreprises'])->where('n_immatriculation',$n_immatriculation)->get();
        $cotisation = cotisation::with(['entreprises','employers'])->where('employer_id',$employer[0]['id'])->get();
        // dd($n_immatriculation);

        return view('pages.frontView.employer.monespace',compact('employer','cotisation'));
    }

    public function EspaceCotisation(){
        $n_immatriculation = Auth::user()->n_affiliation;
        $employer = Employer::with(['entreprises'])->where('n_immatriculation',$n_immatriculation)->get();
        //   $cotisation = cotisation::with(['entreprises','employers'])->where('employer_id',$employer[0]['id']);

    $data = cotisation::whereNull('parent_id')->where('employer_id',$employer[0]['id'])->with(['children','entreprises'])->get();
    //$data = cotisation::where('parent_id',"!=",null)->where('employer_id',$employer[0]['id'])->where('entreprise_id',$employer[0]['entreprises']['id'])->get();
    $grouped = $data->all();
    //  dd($data);
      $cotisation = cotisation::with(['entreprises','employers'])->where('employer_id',$employer[0]['id'])->where('parent_id',"!=",null)
    ->selectRaw("SUM(salaire_brut) as total_brut")
    ->selectRaw("SUM(montant_cotise) as total_cotise")
    ->selectRaw("SUM(salaire_soumis) as total_soumis")
    ->selectRaw("entreprises.raison_sociale")

    ->join('entreprises', 'entreprises.id', '=', 'cotisations.entreprise_id')

    ->groupBy('entreprise_id','entreprises.raison_sociale')
    ->get();
    $total_brut = cotisation::where('employer_id',$employer[0]['id'])->where('parent_id',"!=",null)->sum("salaire_brut");
    $total_soumis = cotisation::where('employer_id',$employer[0]['id'])->where('parent_id',"!=",null)->sum("salaire_soumis");
    $total_cotise = cotisation::where('employer_id',$employer[0]['id'])->where('parent_id',"!=",null)->sum("montant_cotise");
    //  dd($total_cotise);
        return view('pages.frontView.employer.espace-cotisation',compact('employer','cotisation','grouped','total_brut','total_soumis','total_cotise'));
    }

    public function CotisationParEmployeur($raison_sociale,$employer_id){
        $employeur = Entreprise::where('raison_sociale',$raison_sociale)->get();
        // $employer = Employer::with(['entreprises'])->where('n_immatriculation',$n_immatriculation)->get()
        $emp_id = $employeur[0]['id'];
        $cotisation = cotisation::with(['entreprises','employers'])->where('employer_id',$employer_id)->where('entreprise_id',$emp_id)->get();
        // dd($cotisation);
        return view('pages.frontView.employer.detail-cot-empleur',compact('cotisation'));
    }

    public function ReleveParEntreprise($entreprise_id,$employer_id){

        // $demande = Demande::with(['representants','entreprises'])->find($demande);
        // $data['entreprise'] = $demande['entreprises'];
        // $data['representant'] = $demande['representants'];
        // dd($data['representants']);
        $data['cotisation'] = cotisation::with(['entreprises','employers'])->where('employer_id',$employer_id)
        ->where('parent_id',"!=",null)->where('entreprise_id',$entreprise_id)->get();
        $data['total_brut'] = cotisation::where('employer_id',$employer_id)->where('entreprise_id',$entreprise_id)->where('parent_id',"!=",null)->sum("salaire_brut");
        $data['total_soumis'] = cotisation::where('employer_id',$employer_id)->where('entreprise_id',$entreprise_id)->where('parent_id',"!=",null)->sum("salaire_soumis");
        $data['total_cotise'] = cotisation::where('employer_id',$employer_id)->where('entreprise_id',$entreprise_id)->where('parent_id',"!=",null)->sum("montant_cotise");
        $data['part'] = cotisation::where('employer_id',$employer_id)->where('entreprise_id',$entreprise_id)->where('parent_id',"!=",null)->sum("salaire_soumis");
        $data['total_part'] = ($data['part'] * 0.05);
        //  dd($data['total_part'] * 0.05);
        $pdf = Pdf::loadView('pages.frontView.employer.releve-pdf',$data);
        return $pdf->download('formulaire.pdf');

    }

    public function addEmpExcel(Request $request){
        // dd($request->all());
        // dd(Auth::user()->entreprise_id);

        $request->validate(
            [
                'employee_file' => 'required|mimes:xlsx,xls',
            ],
            [
                'employee_file.required' => "Le fichier de l'employer est obligatoire",
                'employee_file.mimes' => "Le fichier de l'employer doit etre du type: xlsx, xls",
            ]
        );


        $headers = ['nom_employer','prenom_employer','sexe_employer','matricule','adresse_employer','email_employer','n_immatriculation','date_naissance_employer','lieu_naissance_employer','nationalite','prenom_pere','prenom_mere','nom_pere','nom_mere','situation_matrimoniale','profession','n_cin','date_del_cin','lieu_del_cin','n_acte_naissance','date_del_acte_naissance','lieu_del_acte_naissance','etat_employer','date_embauche','date_immatriculation','liberer'];

        if(Input::hasFile('employee_file')){
            $headings = (new HeadingRowImport)->toArray(request()->file('employee_file'));
            if(count($headers) != count($headings[0][0])){
                return Redirect::back()->withErrors(['msg' => "Le fichier de l'employer doit etre conforme avec le fichier teste"]);
            }

            // Excel::toArray(new EmployeesImport, request()->file('employee_file'));
            Excel::import(new EmployeesImport, request()->file('employee_file'));

            Alert::toast('Le fichier du l\'employer a ete enregistre avec Succès','success');
            return redirect()->back();

        } else {
            Alert::toast('Le fichier du l\'employer est obligatoire','error');
            return redirect()->back();

        }
    }
}
