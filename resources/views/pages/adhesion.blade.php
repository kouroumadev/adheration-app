@extends('pages.master')
@section('content')


<link rel="stylesheet" href="{{ asset('css/style-wizard.css') }}">
<section class="ftco-section">

<form id="signUpForm" action="#!" data-multi-step-wrap>
    <!-- start step indicators -->
    <div class="form-header d-flex mb-4">
        <span class="stepIndicator active ">Entreprise</span>
        <span class="stepIndicator">Representant Legal</span>
        <span class="stepIndicator">Coordonnees Rep.legal</span>
        <span class="stepIndicator">Recapitulatif</span>
    </div>
    <!-- STEP GLOBAL 1 -->
    <div data-step-global class=" card" style="border: none">
        <h4 class="text-center mb-4 font-weight-bold">Entreprise</h4>
        {{-- <div class="card-title text-center text-danger">
            Saisissez les informations d'identification de votre entreprise
        </div> --}}
        <div class="card-body">
            <div class="row">
                <div class=" col-6 mb-3 d-flex">
                    <input type="text" class="form-control mr-2" id="nom" placeholder="Saississez le No d'affiliation a la CNSS" >
                    <button type="button" class="btn btn-success">Verifier</button>
                </div>
            </div>

            <div class="row">
                <h4 class="text-center mb-4 font-weight-bold text-dark">Etes vous bien l'entreprise ?</h4>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom/Raison Sociale</label>
                    <input type="text" class="form-control" id="nom" placeholder="Raison Sociale" >
                    <label for="exampleFormControlInput1" class="form-label">Registre de Commerce</label>
                    <input type="text" class="form-control" id="nom" placeholder="Registre de Commerce" >

                </div>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Forme Juridique</label>
                    <input type="text" class="form-control" id="nom" placeholder="Forme Juridique" >
                    <label for="exampleFormControlInput1" class="form-label">Nombre Employes</label>
                    <input type="text" class="form-control" id="nom" placeholder="0" >
                </div>

                <button type="button" class="btn btn-primary" data-next-global>Suivant</button>
            </div>

        </div>

    </div>
    <div data-step-global class=" card" style="border: none">
        <h4 class="text-center mb-4 font-weight-bold">Representant Legal</h4>
        <div class="card-body">
            <div class="row">
                <div class=" col-6 mb-3 d-flex">
                    <input type="text" class="form-control mr-2" id="nom" placeholder="Saississez le No document d'identite" >
                    <button type="button" class="btn btn-success">Verifier</button>
                </div>
            </div>

            <div class="row">
                <h4 class="text-center mb-4 font-weight-bold text-dark">Etes vous bien le representant Legal ?</h4>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" >

                </div>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Prenom" >
                </div>

                <div>
                    <button type="button" class="btn btn-primary" data-previous-global>Precedent</button>
                    <button type="button" class="btn btn-primary" data-next-global>Suivant</button>
                </div>

            </div>

        </div>
    </div>
    <div data-step-global class=" card" style="border: none">
        <h4 class="text-center mb-4 font-weight-bold"> Coordonnees Representant Legal</h4>

        <div class="card-body">
            <div class="row">
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="nom" placeholder="Email" >

                </div>
                <div class=" col-6 mb-3">


                    <label for="exampleFormControlInput1" class="form-label">Numero de telelphone</label>
                    <input type="text" class="form-control" id="nom" placeholder="Numero de telelphone" >

                </div>
            </div>
            <button type="button" class="btn btn-primary" data-previous-global>Precedent</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Verification</button>
        </div>

    </div>

    <div data-step-global class=" card" style="border: none">
        <h4 class="text-center mb-4 font-weight-bold">Recapitulatif</h4>
        <div class="card-body">

            <div class="row">
                <h5 class="text-center mb-4 ">Detail de l'entreprise</h5>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ICE</label>
                    <input type="text" class="form-control" id="nom" placeholder="Identifiant Commun de l'Entrprise" >
                    <label for="exampleFormControlInput1" class="form-label">Raison Sociale</label>
                    <input type="text" class="form-control" id="nom" placeholder="Raison Sociale" >
                    <label for="exampleFormControlInput1" class="form-label">Registre de Commerce</label>
                    <input type="text" class="form-control" id="nom" placeholder="Registre de Commerce" >
                    <label for="exampleFormControlInput1" class="form-label">Adresse Sociale</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Identifiant fiscal</label>
                    <input type="text" class="form-control" id="nom" placeholder="identifiant Fiscal" >
                    <label for="exampleFormControlInput1" class="form-label">Forme Juridique</label>
                    <input type="text" class="form-control" id="nom" placeholder="Forme Juridique" >
                    <label for="exampleFormControlInput1" class="form-label">Patente</label>
                    <input type="text" class="form-control" id="nom" placeholder="Patente" >
                    <label for="exampleFormControlInput1" class="form-label">Nombre Employes</label>
                    <input type="text" class="form-control" id="nom" placeholder="0" >
                </div>
            </div>
            <div class="row">
                <h5 class="text-center mb-4 ">Representant legal</h5>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Prenom" >
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" >
                    <label for="exampleFormControlInput1" class="form-label">Document d'identite</label>
                    <input type="text" class="form-control" id="nom" placeholder="Document d'identite" >
                    <label for="exampleFormControlInput1" class="form-label">Code postal</label>
                    <input type="text" class="form-control" id="nom" placeholder="Code postal" >

                </div>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="nom" placeholder="Ville" >
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="nom" placeholder="Email" >
                    <label for="exampleFormControlInput1" class="form-label">Numero de telelphone</label>
                    <input type="text" class="form-control" id="nom" placeholder="Numero de telelphone" >
                    <label for="exampleFormControlInput1" class="form-label">Adresse Personnelle</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-previous-global>Precedent</button>
            {{-- <button type="submit" class="btn btn-primary" >Confirmer</button> --}}
            <a href="{{ route('adh-confirmation') }}" class="btn btn-primary"> Confirmation</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Verification</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center mb-4">Saisissez le Numero envoye par email et par sms</p>
                <div class="row">
                    <input type="text" class="form-control w-50 m-auto" id="nom" placeholder="Code" >
                </div>
                <p class="text-center mt-4"> <a href="http://">Renvoyer le Code</a></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" >Verifier</button>
            <button type="button" class="btn btn-primary" data-next-global data-bs-dismiss="modal"0000.0>Continuer</button>
            </div>
        </div>
        </div>
    </div>
</form>
</section>
@endsection
