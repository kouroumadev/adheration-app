<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLeave;
use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Employer;
use App\Models\cotisation;
use App\Models\User;
use App\Models\assureParent;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeMail;
use App\Mail\ChangerEmployeur;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Alert;
use App\Imports\EmployeesImport;
use Auth;
use Hash;
use DB;


class TeleDeclController extends Controller
{
    public function Immatriculation(){

        $mois = DB::table('mois')->get();
        // $trimestres = DB::table('trimestres')->get();

        $entreprise_id = Auth::user()->entreprise_id;
        $employers = Employer::where('entreprise_id',$entreprise_id)->where('liberer',1)->get();
        //  dd($employers[0]['n_immatriculation']);

        // $title = 'Supprimer l\'employé !';
        // $text = "Etes Vous Sure de vouloir Supprimé cet employé?";
        // confirmAction($title, $text);

        return view('pages.frontView.immatriculation',compact('entreprise_id','employers','mois'));
    }

    public function employeeLeave(Request $request){
        // dd($request->all());

        $employee = Employer::find($request->employee_id);
        // dd($employee['liberer']);
        $employee->update([
            'liberer' => '0'
        ]);
        // $employee['0']->liberer = '0';
        // $employee->save();

        $emp = new EmployeeLeave();
        $emp->entreprise_id = Auth::user()->entreprise_id;
        $emp->employer_id = $request->employee_id;
        $emp->mois = $request->months_id;
        $emp->annee = $request->year;
        $emp->motif = $request->motif;

        $emp->save();

        return redirect()->route('immatriculation');
    }

    public function ChargeAjoutAssure(Request $request){
        $entreprise_id = Auth::user()->entreprise_id;
        $employers = Employer::where('entreprise_id',$entreprise_id)->where('liberer',1)->get();
        $prefectures = DB::select('select * from prefecture');
        $branches = DB::select('select * from branche');
        return view('pages.frontView.charge-ajout-assure',compact('entreprise_id','employers','prefectures','branches'));
    }

    public function ImportImmatriculation(){

        $entreprise_id = Auth::user()->entreprise_id;
        $employers = Employer::where('entreprise_id',$entreprise_id)->where('liberer',1)->get();
        return view('pages.frontView.import-immatriculation',compact('entreprise_id','employers'));
    }
    public function ImportTeledeclaration(){

        $entreprise_id = Auth::user()->entreprise_id;
        $cotisations = cotisation::with(['entreprises','employers'])->where('entreprise_id',$entreprise_id)
        ->where('parent_id',"!=",null)->get();
        $employers = Employer::where('entreprise_id',$entreprise_id)->get();
        // dd($cotisations[0]['salaire_brut']);
        $entreprise = Entreprise::find($entreprise_id);
        // dd($entreprise);

        $mois = DB::table('mois')->get();
        $trimestres = DB::table('trimestres')->get();

        return view('pages.frontView.import-teledeclaration',compact('entreprise','cotisations','employers','mois','trimestres'));

    }

    public function AjoutEmployer(Request $request){
        try {
            // dd($request->all());
            $n_immatriculation = Str::upper(Str::random(13));
            $pass = "Cnss@2024";
            $employeur = Entreprise::find($request->entreprise_id);
            $raison_sociale = $employeur->raison_sociale;
            $nom = $request->nom_employer;
            $prenom = $request->prenom_employer;
            $sexe = $request->sexe_employer;
            $EmployeCheck = Employer::where('matricule',$request->matricule)->get();
            $photoImage = $request->file('photo');
            $save_img ='';
            // dd($request->type_employer);
            if($photoImage){
                $manager = ImageManager::withDriver(new Driver());
                $filename = $photoImage->getClientOriginalName();
                $unique = uniqid()."_".$filename;
                $img = $manager->read($photoImage);
                $taille = $img->resize(500,500);
                $taille->toJpeg(80)->save(base_path('public/upload/photo/'.$unique));
                $save_img = 'upload/photo/'.$unique;


            }
            if(sizeof($EmployeCheck) != 0) {

                Alert::toast('Cet Employé existe déjà','error');
                return redirect()->route('charge-ajout-assure');
                // $data = "exist";
                // return response()->json($data, 200);
            }
            else {
                if ($sexe == "male") {
                  $assure =  Employer::insertGetId([
                    'nom_employer' =>$request->nom_employer,
                    'prenom_employer' =>$request->prenom_employer,
                    'email_employer' =>$request->email_employer,
                    // 'adresse_employer' =>$request->adresse_employer,
                    'n_immatriculation' =>$n_immatriculation,
                    'entreprise_id' =>$request->entreprise_id,
                    'sexe_employer' =>$request->sexe_employer,
                    'matricule' =>$request->matricule,
                    'date_naissance_employer' =>$request->date_naissance_employer,
                    'lieu_naissance_employer' =>$request->lieu_naissance_employer,
                    'pays_naissance_employer' =>$request->pays_naissance_employer,
                    'nationalite' =>$request->nationalite,
                    'ville_employer' =>$request->ville_employer,
                    'commune_employer' =>$request->commune_employer,
                    'quartier_employer' =>$request->quartier_employer,
                    'tel_employer' =>$request->tel_employer,
                    'situation_matrimoniale' =>$request->situation_matrimoniale,
                    'profession' =>$request->profession,
                    'n_cin' =>$request->n_cin,
                    'date_del_cin' =>$request->date_del_cin,
                    // 'lieu_del_cin' =>$request->lieu_del_cin,
                    'photo' =>$save_img,
                    'type_employer' =>$request->type_employer,
                    'salaire_brut' =>$request->salaire_brut,
                    'emploi_occupe' =>$request->emploi_occupe,
                    'date_embauche' =>$request->date_embauche,
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

                    assureParent::insert([
                        'nom_pere' => $request->nom_pere,
                        'prenom_pere' => $request->prenom_pere,
                        'date_naissance_pere' => $request->date_naissance_pere,
                        'lieu_naissance_pere' => $request->lieu_naissance_pere,
                        'etat_pere' => $request->etat_pere,
                        'nom_mere' => $request->nom_mere,
                        'prenom_mere' => $request->prenom_mere,
                        'date_naissance_mere' => $request->date_naissance_mere,
                        'lieu_naissance_mere' => $request->lieu_naissance_mere,
                        'etat_mere' => $request->etat_mere,
                        'employer_id' => $assure,
                    ]);

                } else {
                    $assure =  Employer::insertGetId([
                        'nom_employer' =>$request->nom_employer,
                        'prenom_employer' =>$request->prenom_employer,
                        'email_employer' =>$request->email_employer,
                        // 'adresse_employer' =>$request->adresse_employer,
                        'n_immatriculation' =>$n_immatriculation,
                        'entreprise_id' =>$request->entreprise_id,
                        'sexe_employer' =>$request->sexe_employer,
                        'matricule' =>$request->matricule,
                        'date_naissance_employer' =>$request->date_naissance_employer,
                        'lieu_naissance_employer' =>$request->lieu_naissance_employer,
                        'pays_naissance_employer' =>$request->pays_naissance_employer,
                        'nationalite' =>$request->nationalite,
                        'ville_employer' =>$request->ville_employer,
                        'commune_employer' =>$request->commune_employer,
                        'quartier_employer' =>$request->quartier_employer,
                        'tel_employer' =>$request->tel_employer,
                        'situation_matrimoniale' =>$request->situation_matrimoniale,
                        'profession' =>$request->profession,
                        'n_cin' =>$request->n_cin,
                        'date_del_cin' =>$request->date_del_cin,
                        // 'lieu_del_cin' =>$request->lieu_del_cin,
                        'photo' =>$save_img,
                        'type_employer' =>$request->type_employer,
                        'salaire_brut' =>$request->salaire_brut,
                        'emploi_occupe' =>$request->emploi_occupe,
                        'date_embauche' =>$request->date_embauche,

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

                        assureParent::insert([
                            'nom_pere' => $request->nom_pere,
                            'prenom_pere' => $request->prenom_pere,
                            'date_naissance_pere' => $request->date_naissance_pere,
                            'lieu_naissance_pere' => $request->lieu_naissance_pere,
                            'etat_pere' => $request->etat_pere,
                            'nom_mere' => $request->nom_mere,
                            'prenom_mere' => $request->prenom_mere,
                            'date_naissance_mere' => $request->date_naissance_mere,
                            'lieu_naissance_mere' => $request->lieu_naissance_mere,
                            'etat_mere' => $request->etat_mere,
                            'employer_id' => $assure,
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


            //  $data = "success";
            Mail::to($request->email_employer)->send(new EmployeMail($n_immatriculation,$pass,$raison_sociale,$nom,$prenom));
             Alert::toast('Asuree declare avec succes','success');
            return redirect()->route('charge-ajout-assure');
            // return response()->json($data, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            $message = $e->getMessage();

            dd($message);
            // Alert::toast('un champs est vide','error');
            // return redirect()->route('charge-ajout-assure');
        }


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
        $mois = DB::table('mois')->get();
        $trimestre = DB::table('trimestres')->get();
        //dd($mois);
        $entreprise = Entreprise::find($entreprise_id);
        // dd($entreprise);
        return view('pages.frontView.teledec',compact('entreprise','cotisations','employers','mois','trimestre'));
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
        $data['salaire_brut'] = $employer->salaire_brut;
        return response()->json($data, 200);
    }

    public function AjoutCotisation(Request $request){
        $exist = Cotisation::where('employer_id',$request->employer_id)->where('entreprise_id',$request->entreprise_id)->first();
        $employeur = Entreprise::findOrFail($request->entreprise_id);
        //dd($exist->mois);
        if ($employeur->categorie == "E+20") {

            if ($exist) {
                if ($exist->mois == $request->mois && $exist->annee == $request->anneeMonth) {
                    $data = "exist";
                    return response()->json($data, 200);
                }
                else{
                    cotisation::insert([
                        'entreprise_id' =>$request->entreprise_id,
                        'employer_id' =>$request->employer_id,
                        'jour_declare' =>$request->jour_declare,
                        'mois' =>$request->mois,
                        'annee' =>$request->anneeMonth,
                        'salaire_brute' =>$request->salaire_brut,
                        'salaire_soumis' =>$request->salaire_soumis,
                        'montant_cotise' =>$request->montant_cotise,
                        'parent_id' => $exist->id,
                        'created_at' => Carbon::now()
                    ]);


                    $data = "success";
                    return response()->json($data, 200);
                }

             } else {
                $getfisrtid =   cotisation::insertGetId([
                    'entreprise_id' =>$request->entreprise_id,
                    'employer_id' =>$request->employer_id,
                    'jour_declare' =>$request->jour_declare,
                    'mois' =>$request->mois,
                    'annee' =>$request->anneeMonth,
                    'salaire_brute' =>$request->salaire_brut,
                    'salaire_soumis' =>$request->salaire_soumis,
                    'montant_cotise' =>$request->montant_cotise,
                    'parent_id'=> null,
                    'created_at' => Carbon::now()
                ]);

                cotisation::insert([
                    'entreprise_id' =>$request->entreprise_id,
                    'employer_id' =>$request->employer_id,
                    'jour_declare' =>$request->jour_declare,
                    'mois' =>$request->mois,
                    'annee' =>$request->anneeMonth,
                    'salaire_brute' =>$request->salaire_brut,
                    'salaire_soumis' =>$request->salaire_soumis,
                    'montant_cotise' =>$request->montant_cotise,
                    'parent_id'=> $getfisrtid,
                    'created_at' => Carbon::now()
                ]);
                // return redirect()->route('tele-dec');
                $data = "success";
                return response()->json($data, 200);
             }
        }
        else {

         if ($exist) {
            if ($exist->mois == $request->trimestre && $exist->annee == $request->anneeTrimestre) {
                $data = "exist";
                return response()->json($data, 200);
            }
            else{
                cotisation::insert([
                    'entreprise_id' =>$request->entreprise_id,
                    'employer_id' =>$request->employer_id,
                    'jour_declare' =>$request->jour_declare,
                    'mois' =>$request->trimestre,
                    'annee' =>$request->anneeTrimestre,
                    'salaire_brute' =>$request->salaire_brut,
                    'salaire_soumis' =>$request->salaire_soumis,
                    'montant_cotise' =>$request->montant_cotise,
                    'parent_id' => $exist->id,
                    'created_at' => Carbon::now()
                ]);


                $data = "success";
                return response()->json($data, 200);
            }

         } else {
            $getfisrtid =   cotisation::insertGetId([
                'entreprise_id' =>$request->entreprise_id,
                'employer_id' =>$request->employer_id,
                'jour_declare' =>$request->jour_declare,
                'mois' =>$request->trimestre,
                'annee' =>$request->anneeTrimestre,
                'salaire_brute' =>$request->salaire_brut,
                'salaire_soumis' =>$request->salaire_soumis,
                'montant_cotise' =>$request->montant_cotise,
                'parent_id'=> null,
                'created_at' => Carbon::now()
            ]);

            cotisation::insert([
                'entreprise_id' =>$request->entreprise_id,
                'employer_id' =>$request->employer_id,
                'jour_declare' =>$request->jour_declare,
                'mois' =>$request->trimestre,
                'annee' =>$request->anneeTrimestre,
                'salaire_brute' =>$request->salaire_brut,
                'salaire_soumis' =>$request->salaire_soumis,
                'montant_cotise' =>$request->montant_cotise,
                'parent_id'=> $getfisrtid,
                'created_at' => Carbon::now()
            ]);
            // return redirect()->route('tele-dec');
            $data = "success";
            return response()->json($data, 200);
         }

        }

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
        // dd($employe);
        $nom = $employe->nom_employer;
        $prenom = $employe->prenom_employer;
        $mat = $request->matricule;
        $user = User::where('n_affiliation',$employe->n_immatriculation)->first();
        $entrep_get = Entreprise::find(Auth::user()->entreprise_id);
        $emp = $entrep_get->raison_sociale;
        //  dd($user->entreprise_id);
        // if ($employe->matricule == $request->matricule) {

        //     $data = "exist";
        //     return response()->json($data, 200);
        // }
        // else {
            $authUser = Auth::user()->entreprise_id;
            $employe->entreprise_id = $authUser;
            $employe->liberer = 1;
            // $employe->matricule = $request->matricule;
            $employe->save();
            $user->entreprise_id = $authUser;
            $user->save();

            $data = "success";
            Mail::to($employe->email_employer)->send(new ChangerEmployeur($nom,$prenom,$mat,$emp));
            return response()->json($data, 200);
        // }


    }

    public function ChangeMatricule(Request $request){
        $employe = Employer::find($request->employer_id);
        $nom = $employe->nom_employer;
        $prenom = $employe->prenom_employer;
        $mat = $request->matricule;
        $user = User::where('n_affiliation',$employe->n_immatriculation)->first();
        $entrep_get = Entreprise::find(Auth::user()->entreprise_id);
        $emp = $entrep_get->raison_sociale;
        if ($employe->matricule == $request->NewMatricule) {

                $data = "exist";
                return response()->json($data, 200);
        }
        else {
            $employe->matricule = $request->NewMatricule;
            $employe->save();
            $data = "succes";
            return response()->json($data, 200);
        }
        // dd($request->NewMatricule);
    }

    public function MesCotisations(){

        return view('pages.frontView.mescotisations');
    }
}
