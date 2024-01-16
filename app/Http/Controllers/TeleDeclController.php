<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Employer;
use App\Models\cotisation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeMail;
use App\Mail\ChangerEmployeur;
use Alert;
use Auth;
use Hash;
use DB;


class TeleDeclController extends Controller
{
    public function Immatriculation(){

        $entreprise_id = Auth::user()->entreprise_id;
        $employers = Employer::where('entreprise_id',$entreprise_id)->where('liberer',1)->get();
        //  dd($employers[0]['n_immatriculation']);

        // $title = 'Supprimer l\'employé !';
        // $text = "Etes Vous Sure de vouloir Supprimé cet employé?";
        // confirmAction($title, $text);

        return view('pages.frontView.immatriculation',compact('entreprise_id','employers'));
    }

    public function ChargeAjoutAssure(Request $request){
        $entreprise_id = Auth::user()->entreprise_id;
        $employers = Employer::where('entreprise_id',$entreprise_id)->where('liberer',1)->get();
        return view('pages.frontView.charge-ajout-assure',compact('entreprise_id','employers'));
    }

    public function ImportImmatriculation(){

        $entreprise_id = Auth::user()->entreprise_id;
        $employers = Employer::where('entreprise_id',$entreprise_id)->where('liberer',1)->get();
        return view('pages.frontView.import-immatriculation',compact('entreprise_id','employers'));
    }

    public function AjoutEmployer(Request $request){
        $n_immatriculation = Str::upper(Str::random(13));
        $pass = "Cnss@2024";
        $employeur = Entreprise::find($request->entreprise_id);
        $raison_sociale = $employeur->raison_sociale;
        $nom = $request->nom_employer;
        $prenom = $request->prenom_employer;
        $sexe = $request->sexe_employer;
        $EmployeCheck = Employer::where('matricule',$request->matricule)->get();
        if(sizeof($EmployeCheck) != 0) {

            $data = "exist";
            return response()->json($data, 200);
        }
        else {
            if ($sexe == "male") {
                Employer::insert([
                'nom_employer' =>$request->nom_employer,
                'prenom_employer' =>$request->prenom_employer,
                'email_employer' =>$request->email_employer,
                'adresse_employer' =>$request->adresse_employer,
                'n_immatriculation' =>$n_immatriculation,
                'entreprise_id' =>$request->entreprise_id,
                'sexe_employer' =>$request->sexe_employer,
                'matricule' =>$request->matricule,
                'date_naissance_employer' =>$request->date_naissance_employer,
                'lieu_naissance_employer' =>$request->lieu_naissance_employer,
                'nationalite' =>$request->nationalite,
                'prenom_pere' =>$request->prenom_pere,
                'prenom_mere' =>$request->prenom_mere,
                'nom_pere' =>$request->nom_pere,
                'nom_mere' =>$request->nom_mere,
                'situation_matrimoniale' =>$request->situation_matrimoniale,
                'profession' =>$request->profession,
                'n_cin' =>$request->n_cin,
                'date_del_cin' =>$request->date_del_cin,
                'lieu_del_cin' =>$request->lieu_del_cin,
                'n_acte_naissance' =>$request->n_acte_naissance,
                'date_del_acte_naissance' =>$request->date_del_acte_naissance,
                'lieu_del_acte_naissance' =>$request->lieu_del_acte_naissance,
                'etat_employer' =>$request->etat_employer,
                'date_embauche' =>$request->date_embauche,
                'date_immatriculation' =>Carbon::now(),
                'created_at' => Carbon::now()
                ]);

                $employeur->effectif_homme = $employeur->effectif_homme+1;
                $employeur->save();

                User::insert([
                    'name' => $request->nom_employer,
                    'n_affiliation' => $n_immatriculation,
                    'email' => $request->email_employer,
                    'password' => Hash::make($pass),
                    'created_at' => Carbon::now(),
                    'type_user' => "employer",
                    'entreprise_id' => $request->entreprise_id
                ]);

            } else {
                Employer::insert([
                    'nom_employer' =>$request->nom_employer,
                    'prenom_employer' =>$request->prenom_employer,
                    'email_employer' =>$request->email_employer,
                    'adresse_employer' =>$request->adresse_employer,
                    'n_immatriculation' =>$n_immatriculation,
                    'entreprise_id' =>$request->entreprise_id,
                    'sexe_employer' =>$request->sexe_employer,
                    'matricule' =>$request->matricule,
                    'date_naissance_employer' =>$request->date_naissance_employer,
                    'lieu_naissance_employer' =>$request->lieu_naissance_employer,
                    'nationalite' =>$request->nationalite,
                    'prenom_pere' =>$request->prenom_pere,
                    'prenom_mere' =>$request->prenom_mere,
                    'nom_pere' =>$request->nom_pere,
                    'nom_mere' =>$request->nom_mere,
                    'situation_matrimoniale' =>$request->situation_matrimoniale,
                    'profession' =>$request->profession,
                    'n_cin' =>$request->n_cin,
                    'date_del_cin' =>$request->date_del_cin,
                    'lieu_del_cin' =>$request->lieu_del_cin,
                    'n_acte_naissance' =>$request->n_acte_naissance,
                    'date_del_acte_naissance' =>$request->date_del_acte_naissance,
                    'lieu_del_acte_naissance' =>$request->lieu_del_acte_naissance,
                    'etat_employer' =>$request->etat_employer,
                    'date_embauche' =>$request->date_embauche,
                    'date_immatriculation' =>Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
                    $employeur->effectif_femme = $employeur->effectif_femme+1;
                    $employeur->save();

                    User::insert([
                        'name' => $request->nom_employer,
                        'n_affiliation' => $n_immatriculation,
                        'email' => $request->email_employer,
                        'password' => Hash::make($pass),
                        'created_at' => Carbon::now(),
                        'type_user' => "employer",
                        'entreprise_id' => $request->entreprise_id
                    ]);
            }

        }




        ///// calcul d'effectif et categorie //////////

        $total_effectif = ($employeur->effectif_homme + $employeur->effectif_femme);
        $employeur->nombre_emp = ($employeur->nombre_emp + $total_effectif);
        $employeur->save();
        if ($employeur->nombre_emp <= 20) {
           $employeur->categorie = "E-20";
           $employeur->save();
        } else {
            $employeur->categorie = "E+20";
            $employeur->save();
        }


         $data = "success";
         Mail::to($request->email_employer)->send(new EmployeMail($n_immatriculation,$pass,$raison_sociale,$nom,$prenom));
        return response()->json($data, 200);

    }

    public function VerifAssure(Request $request){
        $n_affiliation = $request->n_affiliation;
        $employer = Employer::with(['entreprises'])->where('n_immatriculation',$n_affiliation)->get();
        if (sizeof($employer) == 1) {
            $liberer =$employer[0]['liberer'];
            if ($liberer == 1) {
                $data = "error";
                return response()->json($data, 200);
            } else {
                $data = $employer;
                return response()->json($data, 200);
            }

        } else {
            $data = "no employer";
            return response()->json($data, 200);
        }


    }
    public function TeleDec(){

        $entreprise_id = Auth::user()->entreprise_id;
        $cotisations = cotisation::with(['entreprises','employers'])->where('entreprise_id',$entreprise_id)
        ->where('parent_id',"!=",null)->get();
        $employers = Employer::where('entreprise_id',$entreprise_id)->get();
        // dd($cotisations[0]['salaire_brut']);
        $entreprise = Entreprise::find($entreprise_id);
        // dd($entreprise);
        return view('pages.frontView.teledec',compact('entreprise','cotisations','employers'));
    }

    public function EmployerDetail($id){
        $employe = Employer::with(['entreprises'])->find($id);
        //  dd($employe);
        return view('pages.frontView.detailemployer',compact('employe'));
    }

    public function GetEmployer(Request $request){

        $employer = Employer::find($request->immatriculation);
        // dd($employer->nom_employer);
        $data['nom_employer'] = $employer->nom_employer;
        $data['prenom_employer'] = $employer->prenom_employer;
        $data['employer_id'] = $employer->id;
        return response()->json($data, 200);
    }

    public function AjoutCotisation(Request $request){
        $exist = Cotisation::where('employer_id',$request->employer_id)->where('entreprise_id',$request->entreprise_id)->first();
        // dd($exist->id);
        if ($exist) {
            $month = Carbon::parse($exist->periode_fin)->format('m');
            $periode_fin = Carbon::parse($request->periode_fin)->format('m');
            if ($periode_fin == $month) {
                        $data = "exist";
                        return response()->json($data, 200);
                    }
                    else {

                        cotisation::insert([
                            'entreprise_id' =>$request->entreprise_id,
                            'employer_id' =>$request->employer_id,
                            'jour_declare' =>$request->jour_declare,
                            'periode_debut' =>$request->periode_debut,
                            'periode_fin' =>$request->periode_fin,
                            'salaire_brut' =>$request->salaire_brut,
                            'salaire_soumis' =>$request->salaire_soumis,
                            'montant_cotise' =>$request->montant_cotise,
                            'parent_id' => $exist->id,
                            'created_at' => Carbon::now()
                        ]);

                        // return redirect()->route('tele-dec');
                        $data = "success";
                        return response()->json($data, 200);
            }

        //    dd($periode_fin);
        } else {

         $getfisrtid =   cotisation::insertGetId([
                'entreprise_id' =>$request->entreprise_id,
                'employer_id' =>$request->employer_id,
                'jour_declare' =>$request->jour_declare,
                'periode_debut' =>$request->periode_debut,
                'periode_fin' =>$request->periode_fin,
                'salaire_brut' =>$request->salaire_brut,
                'salaire_soumis' =>$request->salaire_soumis,
                'montant_cotise' =>$request->montant_cotise,
                'parent_id'=> null,
                'created_at' => Carbon::now()
            ]);

            cotisation::insert([
                'entreprise_id' =>$request->entreprise_id,
                'employer_id' =>$request->employer_id,
                'jour_declare' =>$request->jour_declare,
                'periode_debut' =>$request->periode_debut,
                'periode_fin' =>$request->periode_fin,
                'salaire_brut' =>$request->salaire_brut,
                'salaire_soumis' =>$request->salaire_soumis,
                'montant_cotise' =>$request->montant_cotise,
                'parent_id'=> $getfisrtid,
                'created_at' => Carbon::now()
            ]);
            // return redirect()->route('tele-dec');
            $data = "success";
            return response()->json($data, 200);
        }

        // dd($exist);
        // if (sizeof($exist) == 0) {
        //     cotisation::insert([
        //         'entreprise_id' =>$request->entreprise_id,
        //         'employer_id' =>$request->employer_id,
        //         'jour_declare' =>$request->jour_declare,
        //         'periode_debut' =>$request->periode_debut,
        //         'periode_fin' =>$request->periode_fin,
        //         'salaire_brut' =>$request->salaire_brut,
        //         'salaire_soumis' =>$request->salaire_soumis,
        //         'montant_cotise' =>$request->montant_cotise,
        //         'created_at' => Carbon::now()
        //     ]);

        //     // return redirect()->route('tele-dec');
        //     $data = "success";
        //     return response()->json($data, 200);
        // } else {
        //     $month = Carbon::parse($exist[0]['periode_fin'])->format('m');
        //     $periode_fin = Carbon::parse($request->periode_fin)->format('m');

        //     if ($periode_fin == $month) {
        //         $data = "exist";
        //         return response()->json($data, 200);
        //     }
        //     else {

        //         cotisation::insert([
        //             'entreprise_id' =>$request->entreprise_id,
        //             'employer_id' =>$request->employer_id,
        //             'jour_declare' =>$request->jour_declare,
        //             'periode_debut' =>$request->periode_debut,
        //             'periode_fin' =>$request->periode_fin,
        //             'salaire_brut' =>$request->salaire_brut,
        //             'salaire_soumis' =>$request->salaire_soumis,
        //             'montant_cotise' =>$request->montant_cotise,
        //             'created_at' => Carbon::now()
        //         ]);

        //         // return redirect()->route('tele-dec');
        //         $data = "success";
        //         return response()->json($data, 200);
        //     }
        // }



    }

    public function LibererEmployer(Request $request){
        $id = $request->id;
        // dd($id);
        $employer = Employer::find($id);
        $employer->liberer = 0;
        $employer->save();
        // // dd($employer);
        // Alert::toast('Cet Employé à été liberé', 'success');
        $data = "libre";
        return response()->json($data, 200);
        //  return redirect()->route('immatriculation');
    }

    public function ChangeEmployeur(Request $request){
        $employe = Employer::find($request->employer);
        $nom = $employe->nom_employer;
        $prenom = $employe->prenom_employer;
        $mat = $request->matricule;
        $user = User::where('n_affiliation',$employe->n_immatriculation)->first();
        $entrep_get = Entreprise::find(Auth::user()->entreprise_id);
        $emp = $entrep_get->raison_sociale;
        //  dd($user->entreprise_id);
        if ($employe->matricule == $request->matricule) {

            $data = "exist";
            return response()->json($data, 200);
        }
        else {
            $authUser = Auth::user()->entreprise_id;
            $employe->entreprise_id = $authUser;
            $employe->liberer = 1;
            $employe->matricule = $request->matricule;
            $employe->save();
            $user->entreprise_id = $authUser;
            $user->save();

            $data = "success";
            Mail::to($employe->email_employer)->send(new ChangerEmployeur($nom,$prenom,$mat,$emp));
            return response()->json($data, 200);
        }


    }

    public function MesCotisations(){

        return view('pages.frontView.mescotisations');
    }
}
