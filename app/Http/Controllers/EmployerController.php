<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\cotisation;
use App\Models\Entreprise;
use App\Imports\EmployeesImport;
use App\Imports\CotisationImport;
use Auth;
use Hash;
use DB;
use PDF;
use Input;
use Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Alert;
use App\Models\EmployeeLeave;
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
    //   dd($grouped);
      $cotisation = cotisation::with(['entreprises','employers'])->where('employer_id',$employer[0]['id'])->where('parent_id',"!=",null)
    ->selectRaw("SUM(salaire_brute) as total_brut")
    ->selectRaw("SUM(montant_cotise) as total_cotise")
    ->selectRaw("SUM(salaire_soumis) as total_soumis")
    ->selectRaw("entreprises.raison_sociale")

    ->join('entreprises', 'entreprises.id', '=', 'cotisations.entreprise_id')

    ->groupBy('entreprise_id','entreprises.raison_sociale')
    ->get();
    $total_brut = cotisation::where('employer_id',$employer[0]['id'])->where('parent_id',"!=",null)->sum("salaire_brute");
    $total_soumis = cotisation::where('employer_id',$employer[0]['id'])->where('parent_id',"!=",null)->sum("salaire_soumis");
    $total_cotise = cotisation::where('employer_id',$employer[0]['id'])->where('parent_id',"!=",null)->sum("montant_cotise");
     // dd($cotisation);
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
        $data['total_brut'] = cotisation::where('employer_id',$employer_id)->where('entreprise_id',$entreprise_id)->where('parent_id',"!=",null)->sum("salaire_brute");
        $data['total_soumis'] = cotisation::where('employer_id',$employer_id)->where('entreprise_id',$entreprise_id)->where('parent_id',"!=",null)->sum("salaire_soumis");
        $data['total_cotise'] = cotisation::where('employer_id',$employer_id)->where('entreprise_id',$entreprise_id)->where('parent_id',"!=",null)->sum("montant_cotise");
        $data['part'] = cotisation::where('employer_id',$employer_id)->where('entreprise_id',$entreprise_id)->where('parent_id',"!=",null)->sum("salaire_soumis");
        $data['total_part'] = ($data['part'] * 0.05);
        //  dd($data['total_part'] * 0.05);
        $pdf = Pdf::loadView('pages.frontView.employer.releve-pdf',$data);
        return $pdf->download('formulaire.pdf');

    }

    public function importEmployee(Request $request){
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


        $headers = ['nom_employer','prenom_employer','sexe_employer','matricule','adresse_employer','email_employer','n_immatriculation','date_naissance_employer','lieu_naissance_employer','pays_naissance_employer','nationalite','ville_employer','quartier_employer','commune_employer','tel_employer','situation_matrimoniale','profession','n_cin','date_del_cin','type_employer','lieu_del_cin','date_embauche','salaire_brut','emploi_occupe','liberer'];

        if(Input::hasFile('employee_file')){
            $headings = (new HeadingRowImport)->toArray(request()->file('employee_file'));

            if(count($headers) != count($headings[0][0])){
                return Redirect::back()->withErrors([
                    'msg' => "Le fichier de l'employer doit etre conforme avec le fichier teste, verifiez le nombre de colonnes"
                ]);
            }

            $diff_result = array_diff($headers, $headings[0][0]);
            if(count($diff_result)>0){
                $err = array();

                foreach($diff_result as $key=>$value){
                    $err[] = $value;
                }

                return Redirect::back()->withErrors([
                    'msg' => "Le fichier de l'employer doit etre conforme avec le fichier teste, les colonnes ci-dessous sont absents",
                    'sms' => $err,
                ]);
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

    public function importCotisation (Request $request){
        // dd($request->all());

        $request->validate(
            [
                'cotisation_file' => 'required|mimes:xlsx,xls',
            ],
            [
                'cotisation_file.required' => "Le fichier de l'employer est obligatoire",
                'cotisation_file.mimes' => "Le fichier de l'employer doit etre du type: xlsx, xls",
            ]
        );

        $headers = ['parent_id','employer_matricule','jour_declare','mois','annee'];

        if(Input::hasFile('cotisation_file')){
            $headings = (new HeadingRowImport)->toArray(request()->file('cotisation_file'));
            // dd($headings[0][0]);

            if(count($headers) != count($headings[0][0])){
                return Redirect::back()->withErrors([
                    'msg' => "Le fichier de Cotisation doit etre conforme avec le fichier teste, verifiez le nombre de colonnes"
                ]);
            }

            $diff_result = array_diff($headers, $headings[0][0]);
            if(count($diff_result)>0){
                $err = array();

                foreach($diff_result as $key=>$value){
                    $err[] = $value;
                }

                return redirect(route('import-teledeclaration'))->withErrors([
                    'msg' => "Le fichier de Cotisation doit etre conforme avec le fichier teste, les colonnes ci-dessous sont absentes",
                    'sms' => $err,
                ]);
            }

            // Excel::toArray(new EmployeesImport, request()->file('cotisation_file'));
            Excel::import(new CotisationImport, request()->file('cotisation_file'));
            // dd($t);

            Alert::toast('Le fichier de Cotisation a ete enregistre avec Succès','success');
            return redirect()->route('import-teledeclaration');

        } else {
            Alert::toast('Le fichier du Cotisation est obligatoire','error');
            return redirect()->route('import-teledeclaration');

        }

    }

    public function getAllEmployee(Request $request) {
        // dd($request->all());


        if($request->type == 'E-20'){
            $trimestre = $request->mois;
            $year = $request->year;

            $selected_trimestre = DB::table('trimestres')->where('id',$trimestre)->get();
            // dd($selected_trimestre[0]->id);

            if($trimestre == '1')
                $range = ['1','2','3'];
            else if($trimestre == '2')
                $range = ['4','5','6'];
            else if($trimestre == '3')
                $range = ['7','8','9'];
            else
                $range = ['10','11','12'];



            //GET ALL EMPLOYEES THAT HAVE PAID
            $empPaid = cotisation::where('entreprise_id',Auth::user()->entreprise_id)
                ->where('mois', $trimestre)
                ->where('annee', $year)
                ->pluck('employer_id');

            //GET ALL LEFT EMPLOYEES FOR THIS COMPANY
            $empLeft = EmployeeLeave::where('entreprise_id',Auth::user()->entreprise_id)
                ->whereIn('mois', $range)
                ->where('annee', $year)
                ->pluck('employer_id');
            // dd($empLeft);

            $empLeftNotPaid = array();

            foreach($empLeft as $em){
                if(!in_array($em,$empPaid->toArray())){
                    $empLeftNotPaid [] = $em;
                }
            }


            $empInNotPaid = Employer::where('entreprise_id',Auth::user()->entreprise_id)
                ->where('liberer', '1')
                ->whereNotIn('id',$empPaid)->pluck('id');
            // dd($empInNotPaid);

            $finalEmpId = array_unique(array_merge($empInNotPaid->toArray(),$empLeftNotPaid), SORT_REGULAR);

            // dd($finalEmpId);

            $employees = Employer::where('entreprise_id',Auth::user()->entreprise_id)
            ->whereIn('id',$finalEmpId)
            ->get();

            $employers = Employer::where('entreprise_id',Auth::user()->entreprise_id)->get();
            $entreprise = Entreprise::find(Auth::user()->entreprise_id);
            // dd($entreprise);

            $mois = DB::table('mois')->get();
            $trimestres = DB::table('trimestres')->get();

            return view('pages.frontView.import-teledeclaration', compact('employees','employers','entreprise','mois','trimestres','year','selected_trimestre'));

        } else {
            $mois = $request->mois;
            $year = $request->year;

            $emps = DB::table('employers as emp')
                    ->where('emp.entreprise_id',Auth::user()->id)
                    ->leftJoin('cotisations as cot', function($join) use($mois,$year) {
                        $join->on('cot.employer_id', '=', 'emp.id');
                        $join->where('cot.mois', '!=', $mois);
                        $join->where('cot.annee', '!=', $year);
                    })->get();
            dd('not');
        }

    }

    public function importCotisationAuto(Request $request) {

        // dd($request->all());
        foreach(json_decode($request->employees_list) as $emp){

            $salaire = (int)$emp->salaire_brut;
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


            $cotis = new Cotisation();

            $cotis->entreprise_id = Auth::user()->entreprise_id;
            $cotis->parent_id = '11';
            $cotis->employer_id = $emp->id;
            $cotis->jour_declare = '28';
            $cotis->mois = $request->period;
            $cotis->annee = $request->year;
            $cotis->salaire_brute = $salaire;
            $cotis->salaire_soumis = $soumis;
            $cotis->montant_cotise = $cota;

            $cotis->save();




        }

        Alert::toast('Le fichier de Cotisation a ete enregistre avec Succès','success');
            return redirect()->route('tele-dec');

    }
}
