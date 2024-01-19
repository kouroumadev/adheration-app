<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\email_verification;
use App\Models\Demande;
use App\Models\Entreprise;
use App\Models\Representant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AffMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Alert;
use PDF;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AffiliationController extends Controller
{
    public function Affiliation(){
        $prefectures = DB::select('select * from prefecture');
        $branches = DB::select('select * from branche');
        return view('pages.affiliation',['branches'=>$branches,'prefectures'=>$prefectures]);
    }

    public function LoginPage(){

        return view('pages.login');
    }

    public function BackOfficePage(){

        return view('pages.BackOfficeLogin');
    }

    public function AffConfirmation(){

        return view('pages.confirmation-affiliation');
    }

    public function SendEmail(Request $request){
        $code = rand(0000 , 9999);
        $email = $request->email;
        $mail_exit = email_verification::where('email',$email)->get();
        $mail_exit2 = User::where('email',$email)->get();
        $mail_exit3 = Representant::where('email',$email)->get();
        //  dd(sizeof($mail_exit3));
        $prenom = $request->prenom;
        // dd($prenom);
        if (sizeof($mail_exit2) != 0 || sizeof($mail_exit3) != 0) {
            $data = "exist";
            return response()->json($data, 200);
        }
        else {
           if (sizeof($mail_exit) == 0) {

            email_verification::insert([
                'email' => $email,
                'code' => $code,
            ]);

             Mail::to($email)->send(new AffMail($code,$email,$prenom));

            $data = "sent";
            return response()->json($data, 200);
            }
            else {
                $id = $mail_exit[0]['id'];
                $deleted = DB::table('email_verifications')->where('id', '=', $id)->delete();
                email_verification::insert([
                    'email' => $email,
                    'code' => $code,
                ]);
                 Mail::to($email)->send(new AffMail($code,$email,$prenom));

                $data = "sent";
                return response()->json($data, 200);
            }

        }

        //   dd($email);
    }

    public function GetCommune(Request $request){

        $commune = DB::table('communes')->where('ville_id','=',$request->ville_entreprise)->get();
        // dd($commune);
        return json_encode($commune);
    }

    public function MailVerifAffiliation(Request $request){
        $email = $request->email;
        $code = $request->code;
        $verification = email_verification::where('email',$email)->where('code',$code)->get();
        if (sizeof($verification) == 0) {

            $data = "not verified";
             return response()->json($data);
        }
        else {
            $id = $verification[0]['id'];
            $deleted = DB::table('email_verifications')->where('id', '=', $id)->delete();
            $data = "verified";
             return response()->json($data, 200);
        }


    }

    public function RCCmVerif(Request $request){
        $rccm = $request->num_agrementFieldValue;
        $rccmCheck = Entreprise::where('num_agrement',$rccm)->get();
        if (sizeof($rccmCheck) == 0) {

            $data = "not exist";
             return response()->json($data);
        }
        else {

            $data = "exist";
             return response()->json($data, 200);
        }
    }
    public function AffStore(Request $request){
        // dd($request->i_fiscale);
        $categorie = '';
        $code = Str::upper(Str::random(13));
        $existe = Entreprise::where('raison_sociale',$request->raison_sociale)->get();
        $sigleImage = $request->file('sigle');
        $rccmFile= $request->file('rccm_file');
        $ndniFile= $request->file('num_impot_file');
        // dd($ndniFile);
        $save_img =''; $rccm_path =''; $ndni_path ='';
        if ($rccmFile) {
            $destination_path = 'upload/entreprise_doc';
            $file_name = $rccmFile->getClientOriginalName();
            $uniqueName = uniqid().'rccm'.'.'.'pdf';
            $rccm_path = $rccmFile->move($destination_path,$uniqueName);
        }
        if ($ndniFile) {
            $destination_path = 'upload/entreprise_doc';
            $file_name = $ndniFile->getClientOriginalName();
            $uniqueName = uniqid().'ndni'.'.'.'pdf';
            $ndni_path = $ndniFile->move($destination_path,$uniqueName);
        }

        if($sigleImage){
            $manager = ImageManager::withDriver(new Driver());
            $filename = $sigleImage->getClientOriginalName();
            $unique = uniqid()."_".$filename;
            $img = $manager->read($sigleImage);
            $taille = $img->resize(500,500);
            $taille->toJpeg(80)->save(base_path('public/upload/sigle/'.$unique));
            $save_img = 'upload/sigle/'.$unique;


        }

        if ($request->nombre_emp > 20) {
            $categorie = "E+20";
        } else {
            $categorie = "E-20";
        }
        // dd($categorie);
        //   dd(sizeof($existe));
        if (sizeof($existe) == 1) {
            Alert::toast('Ce Nom d\'entreprise a été déclaré veillez changer le nom','error');
            return redirect()->back();
        } else {
            $entreprise = Entreprise::insertGetId([
                'num_agrement' => $request->num_agrement,
                'raison_sociale' => $request->raison_sociale,
                'num_impot' => $request->num_impot,
                'activite_principale' => $request->activite_principale,
                'quartier_entreprise' => $request->quartier_entreprise,
                'commune_entreprise' => $request->commune_entreprise,
                 'ville_entreprise' =>$request->ville_entreprise,
                 'nombre_emp' =>$request->nombre_emp,
                // 'effectif_homme' =>$request->effectif_homme,
                // 'effectif_femme' =>$request->effectif_femme,
                'boite_postale' =>$request->boite_postale,
                'categorie' =>$categorie,
                'sigle' =>$save_img,
                'rccm_file' =>$rccm_path,
                'num_impot_file' =>$ndni_path,
                'created_at' => Carbon::now()
            ]);
            // // dd($entreprise);
            // ////// Representant store
            $representant = new Representant();
             $representant->prenom =  $request->prenom;
             $representant->nom =  $request->nom;
             $representant->document_identite =  $request->document_identite;
                // 'ville_representant =  $request->ville_representant;
             $representant->email =  $request->email;
             $representant->telephone_representant = $request->telephone_representant;
             $representant->adresse_representant = $request->adresse_representant;
             $representant->entreprise_id =  $entreprise;
            //  $representant->created_at =  Carbon::now();
             $representant->save();
             $representant_id = $representant->id;


            // $representant = Representant::insertGetId([
            //     'prenom' => $request->prenom;
            //     'nom' => $request->nom,
            //     'document_identite' => $request->document_identite,
            //     // 'ville_representant' => $request->ville_representant,
            //     'email' => $request->email,
            //     'telephone_representant' =>$request->telephone_representant,
            //     'adresse_representant' =>$request->adresse_representant,
            //     'entreprise_id' => $entreprise,
            //     'created_at' => Carbon::now()
            // ]);
            // // dd($representant);
            // ///// Demande store
            $demande = Demande::create([
                'representant_id' => $representant,
                'entreprise_id' => $entreprise,
                'type_demande' => "affiliation",
                'code_demande' => $code,


                'created_at' => Carbon::now()
            ]);

            return view('pages.confirmation-affiliation',compact('demande'));
        }


    }

    public function TelDemAff($demande){

        $demande = Demande::with(['representants','entreprises'])->find($demande);
        $data['entreprise'] = $demande['entreprises'];
        $data['representant'] = $demande['representants'];
        // dd($data['representants']);

        $pdf = Pdf::loadView('pages.confirmation-aff-pdf',$data);
        return $pdf->stream('formulaire.pdf');

    }
}
