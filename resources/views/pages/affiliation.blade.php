@extends('pages.master')
<style>


</style>
@section('content')
<link rel="stylesheet" href="{{ asset('css/style-wizard.css') }}">
<section class="ftco-section" style="padding: 0">

<div id="loader"></div>

<form id="signUpForm" action="{{ route('aff-store') }}" method="POST" data-multi-step-wrap style="margin-top:240px" enctype="multipart/form-data">
    @csrf
    <!-- start step indicators -->
    <div class="form-header d-flex mb-4">
        <span class="stepIndicator active ">Representant legal</span>
        <span class="stepIndicator">Identification de l'Entreprise</span>
        <span class="stepIndicator">Details de l'Entreprise</span>
        <span class="stepIndicator">Recapitulatif</span>
    </div>
    <!-- STEP GLOBAL 1 -->
        <div data-step-global class=" card" style="border: none">
        <h4 class="text-center mb-4 font-weight-bold">Representant legal</h4>
        <div class="card-title text-center text-danger">
            Saisissez les informations d'identification de votre Representant
        </div>
        <div class="card-body">
            <div class="row">
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control"
                        name="prenom"

                        id="prenom" required placeholder="name@example.com">
                    <label for="floatingInput">Prenom</label>
                    <span role="alert" class="text-danger error-msg" id="">
                        Le champs prenom est vide
                    </span>
                </div>
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control"
                        name="nom"

                        id="nom"  placeholder="name@example.com" required>
                    <label for="floatingInput">Nom</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs nom est vide
                    </span>
                </div>
            </div>
            <div class="row">
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control"
                        name="document_identite"

                        id="document_identite" required placeholder="name@example.com" required>
                    <label for="floatingInput">Numéro CIN</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Numéro CIN est vide
                    </span>
                </div>
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control"
                        name="email"

                        id="email" required placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Email est vide
                    </span>
                </div>
            </div>
            <div class="row">
                <div class=" col form-floating mb-3">
                    {{-- <input type="tel" class="form-control"
                        name="telephone_representant"

                        id="telephone_representant"  required>
                    <label for="floatingInput">Téléphone</label> --}}

                        <label for="formGroupExampleInput2" class="form-label">Téléphone</label>
                        <input type="tel" name="telephone_representant" style="padding-left: 40px"  required class="form-control" id="telephone_representant">

                    <span role="alert" class="text-danger error-msg" >
                        Le champs Téléphone est vide
                    </span>
                    {{-- <input id="phone" type="tel"> --}}
                    {{-- <button id="btn" type="button">Validate</button> --}}
                    <span id="valid-msg" class="hide"></span>
                    <span id="error-msg" class="hide text-danger"></span>
                </div>
                <div class=" col form-floating mb-3">
                    <textarea class="form-control" name="adresse_representant"

                        placeholder="Leave a comment here" id="adresse_representant" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Adresse</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Adresse est vide
                    </span>
                </div>
            </div>

            {{-- <button type="button" class="btn btn-primary" data-previous-global>Precedent</button> --}}

                <button type="button" class="btn btn-success"   id="sendEmailVerif">Verification</button>

        </div>



    </div>
    <div data-step-global class=" card" style="border: none">
        <h4 class="text-center mb-4 font-weight-bold">Identification Entreprise</h4>
        <div class="card-body">
            <div class="row">
                <div class=" col form-file mb-3">
                    <label for="formFile" class="form-label">Sigle</label>
                    <input class="form-control" type="file" id="sigle" name="sigle">

                    <span role="alert" class="text-danger error-msg" >
                        Le champs sigle est vide
                    </span>
                </div>
            </div>
            <div class="row">
                {{-- <div class=" col mb-3">
                    <label for="exampleFormControlInput1" class="form-label">RCCM</label>
                    <input type="text" class="form-control" id="num_agrement" name="num_agrement" placeholder="RCCM">
                </div> --}}

                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control"
                        name="num_agrement"

                        id="num_agrement" placeholder="name@example.com" required>
                    <label for="floatingInput">RCCM</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs RCCM est vide
                    </span>
                </div>
                <div class=" col form-file mb-3">
                    <label for="formFile" class="form-label">copy RCCM</label>
                    <input class="form-control" type="file" id="rccm_file" name="rccm_file">

                    <span role="alert" class="text-danger error-msg" >
                        Le champs RCCM copy est vide
                    </span>
                </div>
            </div>
            <div class="row">
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control" name="num_impot"

                        placeholder="Leave a comment here" id="num_impot" style="height: 100px" />
                    <label for="floatingTextarea2">Numéro direction Nationale des Impots</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Numéro direction Nationale des Impots est vide
                    </span>
                </div>
                <div class=" col form-file mb-3">
                    <label for="formFile" class="form-label">copy NDNI</label>
                    <input class="form-control" type="file" id="num_impot_file" name="num_impot_file">

                    <span role="alert" class="text-danger error-msg" >
                        Le champs NDNI est vide
                    </span>
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-previous-global>Precedent</button>
            <button type="button" class="btn btn-success"  id="entreprise_identification" >Verification</button>
        </div>

    </div>
    <div data-step-global class=" card" style="border: none">
        <h4 class="text-center mb-4 font-weight-bold">Details Entreprise</h4>
        <div class="card-body">
            <div class="row">
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control"
                        name="raison_sociale"

                        id="raison_sociale" required placeholder="name@example.com" required>
                    <label for="floatingInput">Raison Sociale</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Raison Sociale est vide
                    </span>
                </div>
                <div class=" col form-floating mb-3">
                    <select class="form-select" id="activite_principale" name="activite_principale" aria-label="Default select example">
                        <option selected>Activité</option>
                        @foreach ($branches as $branche )
                        <option value="{{ $branche->id }}">{{ $branche->libelle }}</option>
                        @endforeach


                    </select>

                </div>

            </div>
            <div class="row">
                <div class=" col form-floating mb-3">
                    <select class="form-select" id="ville_entreprise" name="ville_entreprise" aria-label="Default select example">
                        <option selected>Ville</option>
                        @foreach ($prefectures as $pre )
                        <option value="{{ $pre->id }}">{{ $pre->libelle }}</option>
                        @endforeach
                      </select>
                    {{-- <input type="text" class="form-control"
                        name="ville_entreprise"

                        id="ville_entreprise" required placeholder="name@example.com" required>
                    <label for="floatingInput">Ville</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Ville est vide
                    </span> --}}
                </div>
                <div class=" col form-floating mb-3">
                    <select class="form-select" id="commune_entreprise" name="commune_entreprise" aria-label="Default select example">


                    </select>
                    {{-- <input type="text" class="form-control" name="commune_entreprise"

                        placeholder="Leave a comment here" id="commune_entreprise" style="height: 100px" />
                    <label for="floatingTextarea2">Commune</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Commune est vide
                    </span> --}}
                </div>

            </div>
            <div class="row">
                <div class=" col form-floating mb-3">
                    {{-- <select class="form-select" id="quartier_entreprise" name="quartier_entreprise" aria-label="Default select example">
                        <option selected>Quartier</option>
                        <option value="lmamiya">Almamiya</option>
                        <option value="gbessia">Gbessia</option>
                        <option value="taouya">Taouya</option>
                    </select> --}}
                    <input type="text" class="form-control"
                        name="quartier_entreprise"

                        id="quartier_entreprise" required placeholder="name@example.com" >
                    <label for="floatingInput">Quartier</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Quartier est vide
                    </span>
                </div>
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control" name="nombre_emp"

                        placeholder="Effectif" id="nombre_emp" style="height: 100px" />
                    <label for="floatingTextarea2">Effectif total du personnel</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Boite postale est vide
                    </span>
                </div>
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control" name="boite_postale"

                        placeholder="Leave a comment here" id="boite_postale" style="height: 100px" />
                    <label for="floatingTextarea2">Boite postale</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Boite postale est vide
                    </span>
                </div>

            </div>
            {{-- <div class="row">
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control"
                        name="effectif_homme"

                        id="effectif_homme" required placeholder="name@example.com" required>
                    <label for="floatingInput">Effectif Homme</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Effectif Homme est vide
                    </span>
                </div>
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control" name="effectif_femme"

                        placeholder="Leave a comment here" id="effectif_femme" style="height: 100px" />
                    <label for="floatingTextarea2">Effectif Femme</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Effectif Femme est vide
                    </span>
                </div>

            </div> --}}
            {{-- <div class="row">
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control"
                        name="nombre_emp"

                        id="nombre_emp"equired>
                    <label for="floatingInput">Total Employés</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Total Employés est vide
                    </span>
                </div>
                <div class=" col form-floating mb-3">
                    <input type="text" class="form-control" name="categorie"

                        placeholder="Leave a comment here" id="categorie" required />
                    <label for="floatingTextarea2">Categorie</label>
                    <span role="alert" class="text-danger error-msg" >
                        Le champs Categorie est vide
                    </span>
                </div>

            </div> --}}
            {{-- <div class="row">
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Raison Sociale</label>
                    <input type="text" class="form-control" id="raison_sociale" name="raison_sociale" placeholder="Raison Sociale" >
                    <label for="exampleFormControlInput1" class="form-label">Activité Principale</label>
                    <input type="text" class="form-control" name="activite_principale" id="activite_principale" placeholder="Activité Principale" >
                    <label for="exampleFormControlInput1" class="form-label">Quartier</label>
                    <input type="text" class="form-control" name="quartier_entreprise" id="quartier_entreprise" placeholder="Quartier" >
                    <label for="exampleFormControlInput1" class="form-label">Commune</label>
                    <input type="text" class="form-control" name="commune_entreprise" id="commune_entreprise" placeholder="Commune" >
                    <label for="exampleFormControlInput1" class="form-label">Ville</label>
                    <input type="text" class="form-control" name="ville_entreprise" id="ville_entreprise" placeholder="Ville" >
                </div>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Categorie</label>
                    <select class="form-select" name="categorie" id="categorie" aria-label="Categorie">
                        <option selected>Selectionnez une Categorie</option>
                        <option value="E+20">E+20</option>
                        <option value="E-20">E-20</option>

                      </select>
                    <label for="exampleFormControlInput1" class="form-label">Effectif Homme</label>
                    <input type="text" class="form-control" name="effectif_homme" id="effectif_homme" placeholder="0" >
                    <label for="exampleFormControlInput1" class="form-label">Effectif Femme</label>
                    <input type="text" class="form-control" name="effectif_femme" id="effectif_femme" placeholder="0" >
                    <label for="exampleFormControlInput1" class="form-label">Nombre Employes</label>
                    <input type="text" class="form-control" name="nombre_emp" id="nombre_emp" placeholder="0" >
                    <label for="exampleFormControlInput1" class="form-label">Boite postale</label>
                    <input type="text" class="form-control" name="boite_postale" id="boite_postale" placeholder="Boite postale" >
                </div>
            </div> --}}
            <button type="button" class="btn btn-primary" data-previous-global>Precedent</button>
            <button type="button" class="btn btn-success" id="detail_entreprise" >Suivant</button>
        </div>

    </div>

    <div data-step-global class="card" style="border: none margin-left:150px">
        <h4 class="text-center mb-4 font-weight-bold">Recapitulatif</h4>

        <h5 class=" mb-4 ">Details Entreprise</h5>

        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold ">RCCM :</div>
            <div class="col-lg-9 col-md-8" id="re_num_agrement"></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold">Raison Sociale :</div>
            <div class="col-lg-9 col-md-8" id="re_raison_sociale"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold ">Ville :</div>
            <div class="col-lg-9 col-md-8" id="re_ville_entreprise"></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold">Commune :</div>
            <div class="col-lg-9 col-md-8" id="re_commune_entreprise"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold ">Quartier :</div>
            <div class="col-lg-9 col-md-8" id="re_quartier_entreprise"></div>
        </div>

        {{-- <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold">Effectif Homme :</div>
            <div class="col-lg-9 col-md-8" id="re_effectif_homme"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold ">Effectif Femme :</div>
            <div class="col-lg-9 col-md-8" id="re_effectif_femme"></div>
        </div> --}}

        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold">Numéro Impot :</div>
            <div class="col-lg-9 col-md-8" id="re_num_impot"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold ">Nombre Employés :</div>
            <div class="col-lg-9 col-md-8" id="re_nombre_emp"></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold">Boite postale :</div>
            <div class="col-lg-9 col-md-8" id="re_boite_postale"></div>
        </div>

        <h5 class=" mb-4 ">Representant legal</h5>

        <div class="row">
            <div class="col-lg-3 col-md-4 label font-weight-bold ">Prenom :</div>
            <div class="col-lg-9 col-md-8" id="re_prenom"></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 label">Nom :</div>
            <div class="col-lg-9 col-md-8" id="re_nom"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 label ">CIN :</div>
            <div class="col-lg-9 col-md-8" id="re_document_identite"></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 label">Email :</div>
            <div class="col-lg-9 col-md-8" id="re_email"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 label ">Téléphone :</div>
            <div class="col-lg-9 col-md-8" id="re_telephone_representant"></div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3 col-md-4 label">Adresse :</div>
            <div class="col-lg-9 col-md-8" id="re_adresse_representant"></div>
        </div>

        <div class="">
            <button type="button" class="btn btn-primary" data-previous-global>Precedent</button>
            <button type="submit" class="btn btn-success" >Confirmer</button>
        </div>

        {{-- <div class="card-body">


            <div class="row">
                <h5 class="text-center mb-4 ">Detail de l'entreprise</h5>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">RCCM</label>
                    <input type="text" class="form-control" id="re_num_agrement" readonly>
                    <label for="exampleFormControlInput1" class="form-label">Raison Sociale</label>
                    <input type="text" class="form-control" id="re_raison_sociale"  >
                    <label for="exampleFormControlInput1" class="form-label">Activité Principale</label>
                    <input type="text" class="form-control" id="re_activite_principale" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Quartier</label>
                    <input type="text" class="form-control" id="re_quartier_entreprise" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Effectif Homme</label>
                    <input type="text" class="form-control" id="re_effectif_homme" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Categorie</label>
                    <input type="text" class="form-control" id="re_categorie" readonly >
                </div>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Numero Impot</label>
                    <input type="text" class="form-control" id="re_num_impot" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="re_ville_entreprise" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Commune</label>
                    <input type="text" class="form-control" id="re_commune_entreprise" readonly>
                    <label for="exampleFormControlInput1" class="form-label">Nombre Employes</label>
                    <input type="text" class="form-control" id="re_nombre_emp" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Effectif Femme</label>
                    <input type="text" class="form-control" id="re_effectif_femme" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Boite Postale</label>
                    <input type="text" class="form-control" id="re_boite_postale" readonly >
                </div>
            </div>
            <div class="row">
                <h5 class="text-center mb-4 ">Representant legal</h5>
                <div class=" col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="re_prenom" readonly>
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="re_nom" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Document d'identite</label>
                    <input type="text" class="form-control" id="re_document_identite" readonly >


                </div>
                <div class=" col-6 mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="re_email" readonly >
                    <label for="exampleFormControlInput1" class="form-label">Numero de telephone</label>
                    <input type="text" class="form-control" id="re_telephone_representant" readonly>
                    <label for="exampleFormControlInput1" class="form-label">Adresse Personnelle</label>
                    <textarea class="form-control" id="re_adresse_representant" rows="3" readonly></textarea>
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-previous-global>Precedent</button>
            <button type="submit" class="btn btn-primary" >Confirmer</button>
            {{-- <a href="{{ route('aff-confirmation') }}" class="btn btn-primary"> Confirmation</a>
        </div> --}}
    </div>

    {{-- <div id="openModal" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close">X</a>
            <h2>
                Modal Box</h2>
            <p>
                Hello world</p>
        </div>
    </div> --}}
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Verification</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="successChecked" class="mb-4 d-none">
                    <div class="icon w-50 m-auto">
                        <img src="{{ asset('images/check.png') }}" style="margin-left: 100px" width="100" height="100" alt="" srcset="">

                    </div>
                      <h3 class="text-center mb-4 text-success">Verifié avec Success</h3>
                </div>

                <div id="check-process">
                    <div class=" col form-floating mb-3">
                        <input type="text" class="form-control"
                            name="telephone_representant"

                            id="code_affiliation" required placeholder="name@example.com" required>
                        <label for="floatingInput">Saisissez le Code envoye par email</label>
                        <span role="alert" class="text-danger d-none" id="error-verif-check" >
                            Le champs est vide ou le code saisi ne correspond pas
                        </span>
                    </div>
                    {{-- <p class="text-center mb-4">Saisissez le Code envoye par email </p>
                    <div class="row">
                        <input type="text" class="form-control w-50 m-auto" id="code_affiliation" placeholder="Code" >
                    </div> --}}
                    <p class="text-center mt-4 text-danger"> <a href="#" id="resentEmail">Renvoyer le Code</a></p>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" id="aff-verif-btn" >Verifier</button>
            <button type="button" class="btn btn-primary d-none" id="btn-modal-continuer" data-next-global data-bs-dismiss="modal">Continuer</button>
            </div>
        </div>
        </div>
    </div>

    {{--////////// RCCM Verification ///// --}}
<div class="modal fade" id="rccmCheckedModal" tabindex="-1" aria-labelledby="rccmCheckedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">V</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> --}}
        <div class="modal-body">
            <div class="icon w-50 m-auto">
                <img src="{{ asset('images/check.png') }}" style="margin-left: 100px" width="100" height="100" alt="" srcset="">

            </div>
              <h3 class="text-center mb-4 text-success">Verifié avec Success</h3>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="button" class="btn btn-primary" data-next-global data-bs-dismiss="modal">Continuer</button>
        </div>
      </div>
    </div>
  </div>

</form>
</section>

@endsection
