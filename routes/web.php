<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AffiliationController;
use App\Http\Controllers\AdhesionController;
use App\Http\Controllers\BackOfficeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeleDeclController;
use App\Http\Controllers\EmployerController;
use App\Models\Employer;
use App\Models\cotisation;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

        $prefectures = DB::select('select * from prefecture');
        $branches = DB::select('select * from branche');

    return view('pages.affiliation',['branches'=>$branches,'prefectures'=>$prefectures]);
})->name('acceuil');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::user()->first_login == 0){
            $id = Auth::user()->id;
            $name = Auth::user()->name;
            return view('pages.first-login', compact('id','name'));
        }
        else {
            if(Auth::user()->type_user == "employeur"){

                return view('pages.frontView.index');
            }
            elseif(Auth::user()->type_user == "employer"){
                $n_immatriculation = Auth::user()->n_affiliation;
                $employer = Employer::with(['entreprises'])->where('n_immatriculation',$n_immatriculation)->get();
                $cotisation = cotisation::with(['entreprises','employers'])->where('employer_id',$employer[0]['id'])->get();
            //  dd($cotisation);
                return view('pages.frontView.index-employer',compact('employer','cotisation'));
            }
            else {
                return view('pages.backView.index');
            }
        }

    })->name('dashboard');

    Route::get('/demande-non-approuve', [AdminController::class, 'DemandeNonApprouve'])->name('demande-non-approuve');
    Route::get('/demande-approuve', [AdminController::class, 'DemandeApprouve'])->name('demande-approuve');
    Route::get('/get-num-immatriculation', [AdminController::class, 'GetNumImmatriculation'])->name('get-num-immatriculation');
    Route::post('/ajout-num-aff', [AdminController::class, 'AjoutNumAff'])->name('ajout-num-aff');
    Route::get('/get-info', [AdminController::class, 'GetInfo'])->name('get-info');
    Route::get('/facturation', [AdminController::class, 'Facturation'])->name('facturation');
    Route::get('/initialisation-cotisation/{id}', [AdminController::class, 'InitialisationCotisation'])->name('initialisation-cotisation');
    Route::post('/insert-facture', [AdminController::class, 'InsertFacture'])->name('insert-facture');
    // Route::get('/approuve-demande', [AdminController::class, 'ApprouveDemande']);
    Route::get('/tele-dec', [TeleDeclController::class, 'TeleDec'])->name('tele-dec');
    Route::get('/immatriculation', [TeleDeclController::class, 'Immatriculation'])->name('immatriculation');
    Route::get('/charge-ajout-assure', [TeleDeclController::class, 'ChargeAjoutAssure'])->name('charge-ajout-assure');
    Route::get('/import-immatriculation', [TeleDeclController::class, 'ImportImmatriculation'])->name('import-immatriculation');
    Route::get('/import-teledeclaration', [TeleDeclController::class, 'ImportTeledeclaration'])->name('import-teledeclaration');
    Route::post('/ajout-employer', [TeleDeclController::class, 'AjoutEmployer'])->name('ajout-employer');
    Route::get('/employer-detail/{id}', [TeleDeclController::class, 'EmployerDetail'])->name('employer-detail');
    Route::get('/get-employer', [TeleDeclController::class, 'GetEmployer'])->name('get-employer');
    Route::post('/ajout-cotisation', [TeleDeclController::class, 'AjoutCotisation'])->name('ajout-cotisation');
    Route::get('/verification-assure', [TeleDeclController::class, 'VerifAssure'])->name('verification-assure');
    Route::get('/liberer-employer', [TeleDeclController::class, 'LibererEmployer'])->name('liberer-employer');
    Route::get('/change-employeur', [TeleDeclController::class, 'ChangeEmployeur'])->name('change-employeur');
    Route::get('/mes-cotisations', [TeleDeclController::class, 'MesCotisations'])->name('mes-cotisations');

    //////// Route employer ///////////
    Route::get('/mon-espace', [EmployerController::class, 'MonEspace'])->name('mon-espace');
    Route::get('/espace-cotisation', [EmployerController::class, 'EspaceCotisation'])->name('espace-cotisation');
    Route::get('/cotisation-par-employeur/{raison_sociale}/{employer_id}', [EmployerController::class, 'CotisationParEmployeur'])->name('cotisation-par-employeur');
    Route::get('/releve-par-entreprise/{entreprise_id}/{employer_id}', [EmployerController::class, 'ReleveParEntreprise'])->name('releve-par-entreprise');


    /////////ROUTES FOR EMPLOYEE EXCEL CSV FILE /////////
    Route::post('/import-employee', [EmployerController::class, 'importEmployee'])->name('import-employee');

    ///////ROUTES FOR COTISATIONS ///////////////
    Route::post('/import-cotisation', [EmployerController::class, 'importCotisation'])->name('import-cotisation');




});

// Route::get('/login', [AffiliationController::class, 'LoginPage'])->name('login');
Route::get('/back-office', [AffiliationController::class, 'BackOfficePage'])->name('back-office');


//////////// Admin Routes ////////////////
Route::post('/first_login_password', [AdminController::class, 'FirstLogPasse'])->name('first_login_password');
Route::post('/login-ajax', [AdminController::class, 'LoginAjax'])->name('login-ajax');

/////////// AFFILIATION ROUTES ////////////
Route::get('/affiliation', [AffiliationController::class, 'Affiliation'])->name('affiliation');
Route::get('/aff-confirmation', [AffiliationController::class, 'AffConfirmation'])->name('aff-confirmation');
Route::get('/sendEmail', [AffiliationController::class, 'SendEmail'])->name('send-mail');
Route::get('/get-commune', [AffiliationController::class, 'GetCommune'])->name('get-commune');
Route::get('/rccm-verif', [AffiliationController::class, 'RccmVerif'])->name('rccm-verif');
Route::get('/mailVerifAffiliation', [AffiliationController::class, 'MailVerifAffiliation'])->name('mail-verification');
Route::post('/aff-store', [AffiliationController::class, 'AffStore'])->name('aff-store');
Route::get('/telecharger-demande-affiliation/{demande}', [AffiliationController::class, 'TelDemAff'])->name('telecharger-demande-affiliation');



/////////// ADHESION ROUTES ////////////
Route::get('/adhesion', [AdhesionController::class, 'Adhesion'])->name('adhesion');
Route::get('/adh-confirmation', [AdhesionController::class, 'AdhConfirmation'])->name('adh-confirmation');


//////////// BACK OFFICE ROUTES ///////////
