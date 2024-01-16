<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\Demande;
use App\Models\Entreprise;
use App\Models\cotisation;
use App\Models\NumStore;
use App\Models\Sequence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\LoginInfo;
use Alert;
use Hash;
use Auth;

class AdminController extends Controller
{

    public function LoginAjax(Request $request){
        // dd($request->all());
        $n_affiliation = $request->n_affiliation;
        $password = $request->password;
        //dd(session(),$password);
        //dd(Auth::attempt(['n_affiliation' => $n_affiliation, 'password' => $password]));

        if (Auth::attempt(['n_affiliation' => $n_affiliation, 'password' => $password])) {

            $data = "success";
           return response()->json($data, 200);
        }
        else{
            $data = "error";
            return response()->json($data, 200);
        }
        // dd($n_affiliation);
    }
    public function FirstLogPasse(Request $request){
        $id = $request->id;
        $user = User::find($id);
        if (Hash::check($request->password, $user->password)) {
            Alert::toast('Le nouveau et l\'encien mot de passe ne doivent pas etre identique','error');
            // dd('identique');
             return redirect()->back();
        } else {
            // dd($user->password);
            if ($user->type_user == "employeur") {
                $request->validate([
                    'password' => ['required','confirmed', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()]
                    ],

                );
                $user->password = Hash::make($request->password);
                $user->first_login = 1;
                $user->save();
                 Alert::toast('Votre mot de passe a ete change avec Succès','success');
                return redirect('login');
            }
            elseif ($user->type_user == "employer") {
                $request->validate([
                    'password' => ['required','confirmed', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()]
                    ],

                );
                $user->password = Hash::make($request->password);
                $user->first_login = 1;
                $user->save();
                 Alert::toast('Votre mot de passe a ete change avec Succès','success');
                return redirect('login');
            }
            else {
                $request->validate([
                    'password' => ['required', 'confirmed',Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()]
                    ],

                );
                $user->password = Hash::make($request->password);
                $user->first_login = 1;
                $user->save();
                return redirect('back-office');
            }
        }

    }

    public function DemandeNonApprouve(){

        $demande = Demande::with(['entreprises','representants'])->where('status_demande',0)->get();
        // $demande = Demande::where('status_demande',0)->get();
        // dd($demande->entreprises);
        //  dd($demande[0]['entreprises']['raison_sociale']);
        return view('pages.backView.demandNonApp',compact('demande'));
    }

    public function DemandeApprouve(){

        $demande = Demande::with(['entreprises','representants'])->where('status_demande',1)->get();
        //  dd($demande[0]['entreprises']['raison_sociale']);
        return view('pages.backView.demandApp',compact('demande'));
    }

    public function GetNumImmatriculation(Request $request ){
        $seq_num=0;
        $day = date('d');
        $month = date('m');
        $last_employeur = Entreprise::latest()->get();
        $last_sequence = Sequence::latest()->get();
        // dd($last_sequence);
        // $last_employeur_immat = $last_employeur[0]['n_immatriculation'];
        // // $sequence =substr($last_employeur_immat,4);
         $demande = Demande::with(['representants','entreprises'])->find($request->id);
        // $rccm = substr($demande['entreprises']['num_agrement'],0,3) ;
         $activite = DB::table('branche')->where('id', '=', $demande['entreprises']['activite_principale'])->get();
         $code_activite = $activite[0]->code;
         $ville = DB::table('prefecture')->where('id', '=', $demande['entreprises']['ville_entreprise'])->get();
         $code_ville = $ville[0]->code;
        // $n_mmatriculation = $code_activite.$code_ville.$sequence.$type;
        if (sizeof($last_sequence)==0) {
            $seq_num = $seq_num+1;
            // $sequence = substr($last_employeur_immat,6,3);
            $n_immatriculation = $code_activite.$code_ville.$seq_num.$code_ville.'00';
            Sequence::insert([
                'code'=>$seq_num,
                'created_at' => carbon::now(),
            ]);
            // dd($seq_num);
            return response()->json(array(
                'alert' => 'success',
                'n_immatriculation' => $n_immatriculation,

            ));
        }
        else{
            $seq_num = $last_sequence[0]['code']+1;

            $n_immatriculation = $code_activite.$code_ville.$seq_num.$code_ville.'00';

            Sequence::insert([
                'code'=>$seq_num,
                'created_at' => carbon::now(),
            ]);
            // dd($seq_num);
            //dd($n_immatriculation);
            return response()->json(array(
                'alert' => 'success',
                'n_immatriculation' => $n_immatriculation,

            ));
        }

    }

    public function GetInfo(Request $request){
        $id = $request->id;
        $data = Demande::with(['representants','entreprises'])->find($id);
        // dd($data['entreprises']['raison_sociale']);
        return response([
            'raison_sociale' => $data['entreprises']['raison_sociale'],
            'n_emp' => $data['entreprises']['nombre_emp'],
            'categorie' => $data['entreprises']['categorie'],
            'prenom' => $data['representants']['prenom'],
            'nom' => $data['representants']['nom'],
            'telephone' => $data['representants']['telephone_representant'],
            'adresse_re' => $data['representants']['adresse_representant'],
            'document_identite' => $data['representants']['document_identite'],
        ],200);
        // dd($data['representants']['prenom']);
    }
    public function AjoutNumAff(Request $request){
        $id = $request->id;
        // dd($request->immatriculation);
        $n_affiliation = $request->immatriculation;
        $exist = User::where('n_affiliation',$n_affiliation)->get();
        $pass = 'Cnss@2024';
        $data = Demande::with(['representants','entreprises'])->find($id);
        $employeur_id = $data['entreprises']['id'];

         $employeur = Entreprise::find($employeur_id);
          //dd($request->n_immatriculation);
        $email_exist = User::where('email',$data['representants']['email'])->get();
        if (sizeof($exist) == 1) {
            $data = "exist";
            return response()->json($data, 200);
        }

        else {

            $employeur->n_immatriculation = $request->immatriculation;
            $employeur->save();

            User::insert([
                'name' => $data['representants']['prenom'],
                'n_affiliation' => $n_affiliation,
                'email' => $data['representants']['email'],
                'password' => Hash::make($pass),
                'created_at' => Carbon::now(),
                'type_user' => "employeur",
                'entreprise_id' => $data['entreprises']['id']
            ]);
            $data->status_demande = 1;
            $data->save();

            // TODO SENDING MAIL WITH LOGIN DETAILS
            Mail::to($data['representants']['email'])->send(new LoginInfo($n_affiliation,$pass));
            //             Alert::toast('Cette demande à été approuvée','success');
            //              return redirect()->back();

            $data = "sent";
            return response()->json($data, 200);
        }
    }

    public function Facturation(){

        $employeur = Entreprise::all();
        return view('pages.backView.facturation',compact('employeur'));
    }

    public function InitialisationCotisation($id){
        $montant_cotise = cotisation::where('entreprise_id',$id)->sum('montant_cotise');
        $employeur = Entreprise::find($id);
         dd($employeur->categorie);

    }
    public function InsertFacture(Request $request){
        dd($request->id);
    }
}
