@extends('pages.frontView.master')
@section('content-front')

<section class="">
    <style>
        .col-md-8 {
            margin-bottom: 10px;
        }

        :root {
            --primary-color: rgb(11, 78, 179)
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box
        }

        body {
            font-family: Montserrat, "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: grid;
            place-items: center;
            min-height: 100vh;
            background-color: #f5f5f5
        }

        label {
            display: block;
            margin-bottom: 0.5rem
        }

        input {
            display: block;
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            height: 50px
        }

        .width-50 {
            width: 50%
        }

        .ml-auto {
            margin-left: auto
        }

        .text-center {
            text-align: center
        }

        .progressbar {
            position: relative;
            display: flex;
            justify-content: space-between;
            counter-reset: step;
            margin: 2rem 0 4rem
        }

        .progressbar::before,
        .progress {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            background-color: #dcdcdc;
            z-index: 1
        }

        .progress {
            background-color: rgb(0 128 0);
            width: 0%;
            transition: 0.3s
        }

        .progress-step {
            width: 2.1875rem;
            height: 2.1875rem;
            background-color: #dcdcdc;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1
        }

        .progress-step::before {
            counter-increment: step;
            content: counter(step)
        }

        .progress-step::after {
            content: attr(data-title);
            position: absolute;
            top: calc(100% + 0.5rem);
            font-size: 0.85rem;
            color: #666
        }

        .progress-step-active {
            background-color: var(--primary-color);
            color: #f3f3f3
        }

        .form {
            width: clamp(320px, 30%, 430px);
            margin: 0 auto;
            border: none;
            border-radius: 10px !important;
            overflow: hidden;
            padding: 1.5rem;
            background-color: #fff;
            padding: 20px 30px
        }

        .step-forms {
            display: none;
            transform-origin: top;
            animation: animate 1s
        }

        .step-forms-active {
            display: block
        }

        .group-inputs {
            margin: 1rem 0
        }

        @keyframes animate {
            from {
                transform: scale(1, 0);
                opacity: 0
            }

            to {
                transform: scale(1, 1);
                opacity: 1
            }
        }

        .btns-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            width: 50%;
            margin: auto;
            gap: 1.5rem
        }

        .btn {
            padding: 0.75rem;
            display: block;
            text-decoration: none;
            background-color: var(--primary-color);
            color: #f3f3f3;
            text-align: center;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: 0.3s
        }

        .btn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color)
        }

        .progress-step-check {
            position: relative;
            background-color: green !important;
            transition: all 0.8s
        }

        .progress-step-check::before {
            position: absolute;
            content: '\2713';
            width: 100%;
            height: 100%;
            top: 8px;
            left: 13px;
            font-size: 12px
        }

        .group-inputs {
            position: relative
        }

        .group-inputs label {
            font-size: 13px;
            position: absolute;
            height: 19px;
            padding: 4px 7px;
            top: -14px;
            left: 10px;
            color: #a2a2a2;
            background-color: white
        }

        .welcome {
            height: 450px;
            width: 350px;
            background-color: #fff;
            border-radius: 6px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .welcome .content {
            display: flex;
            align-items: center;
            flex-direction: column
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none
            }

            50% {
                transform: scale3d(1.1, 1.1, 1)
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142
            }
        }
    </style>


    <section class="dasboard" style="width: 1050px">
        <div id="loader"></div>

        <div class="col-xl-12">

            <div class="card" style="max-width:100%">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview" aria-selected="true"
                                role="tab">Nouveau assuré(e)</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-edit" aria-selected="false" role="tab"
                                tabindex="-1">Déja Assuré</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade profile-overview active show"
                            id="profile-overview" role="tabpanel">
                            <form id="" action="{{ route('ajout-employer') }}" method="POST"  class="mb-3" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="entreprise_id" id="entreprise_id"
                                    value="{{ $entreprise_id }}">

                                {{-- <input type="hidden" name="token" id="token" value="{{ @csrt_token }}"> --}}



                                    <div class="progressbar">
                                        <div class="progress" id="progress"></div>

                                        <div class="progress-step progress-step-active" data-title="Identification de l'assuré(e)"></div>
                                        <div class="progress-step" data-title="Type Assuré(e)"></div>
                                        {{-- <div class="progress-step" data-title="Paiement"></div> --}}
                                        <div class="progress-step" data-title="Documents"></div>
                                        <div class="progress-step" data-title="Parents"></div>
                                        {{-- <div class="progress-step" data-title="Empreintes"></div>
                                        <div class="progress-step" data-title="Signature"></div> --}}
                                        <div class="progress-step" data-title="Soumettre"></div>
                                    </div>
                                    <!-- Information personnelles -->
                                    <div class="step-forms step-forms-active">

                                        <h4 class="" >I. IDENTIFICATION DE L'ASSURE(E)</h4>
                                        <hr  class="mb-2" style="border: 3px solid green; margin-bottom:3px;"/>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">N Matricule Chez l'employeur</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="matricule" id="matricule">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Nom Naissance</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nom_employer" id="nom_employer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Prénoms</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="prenom_employer" id="prenom_employer">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Date de Naissance</label>
                                                    <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="date_naissance_employer" id="date_naissance_employer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Lieu de naissance</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="lieu_naissance_employer" id="lieu_naissance_employer">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Sexe</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" name="sexe_employer"
                                                        id="sexe_employer"
                                                        aria-label="Floating label select example">
                                                        <option selected>Sexe</option>
                                                        <option value="homme">Homme</option>
                                                        <option value="femme">Femme</option>
                                                        {{-- <option value="divorce">Divorce(e)</option> --}}
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Pays de naissance</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="pays_naissance_employer" id="pays_naissance_employer">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Situation matrimoniale</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" name="situation_matrimoniale"
                                                        id="situation_matrimoniale"
                                                        aria-label="Floating label select example">
                                                        <option selected>Situation matrimoniale</option>
                                                        <option value="marie">marie(e)</option>
                                                        <option value="celibataire">Celibataire</option>
                                                        <option value="divorce">Divorce(e)</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Nationalié</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nationalite" id="nationalite">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Ville</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" name="ville_employer"
                                                        id="ville_employer"
                                                        aria-label="Floating label select example">

                                                        <option selected>Ville</option>
                                                        @foreach ($prefectures as $pre )
                                                        <option value="{{ $pre->id }}">{{ $pre->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Commune</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" name="commune_employer"
                                                        id="commune_employer"
                                                        aria-label="Floating label select example">


                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">

                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Quartier </label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="quartier_employer" id="quartier_employer">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">E-mail</label>
                                                    <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="email_employer" id="email_employer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">N Téléphone</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="tel_employer" id="tel_employer">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="btns-group">

                                            <a href="#" class="btn btn-next">Suivant</a>
                                        </div>

                                    </div>
                                    <!-- Information des parents -->
                                    <div class="step-forms">

                                        <h4 class="">II. TYPE ASSURE(E)</h4>
                                        <hr  class="mb-2" style="border: 3px solid green; margin-bottom:3px;"/>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Type Assure(e)</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" name="type_employer"
                                                        id="type_employer"
                                                        aria-label="Floating label select example">
                                                        <option selected>Type</option>
                                                        <option value="normal">Normal</option>
                                                        <option value="temporaire">Temporaire</option>
                                                        <option value="apprenti">Apprenti</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Date d'embauche</label>
                                                    <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="date_embauche" id="date_embauche">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Rénumération brute mensuelle</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="salaire_brut" id="salaire_brut">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Emploi occupé</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="emploi_occupe" id="emploi_occupe">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Qualification professionelle</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="profession" id="profession">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                            <div class="btns-group">
                                                <a href="#" class="btn btn-prev">Precedent</a>
                                                <a href="#" class="btn btn-next">Suivant</a>
                                            </div>

                                     </div>

                                    <div class="step-forms">


                                        <h4 class="">III.PIECES A JOINDRE</h4>
                                        <hr  class="mb-2" style="border: 3px solid green; margin-bottom:3px;"/>
                                        <div class="row mb-3 d-none" id="photo_wrapper" style="width: 150px; height:150px; margin:auto; ">
                                            <img src="" alt="" srcset="" id="photo_disp" style="border-radius: 50%">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">No CIN/Passeport</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="n_cin" id="n_cin">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Date de delivrance</label>
                                                    <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="date_del_cin" id="date_del_cin">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputNumber" class="col-sm-2 col-form-label">Photo</label>
                                                    <div class="col-sm-10">
                                                    <input class="form-control" name="photo" id="photo" type="file" onchange="chargePhoto(this)">
                                                    </div>
                                                </div>
                                            </div>

                                          </div>
                                            <div class="btns-group">
                                                <a href="#" class="btn btn-prev">Precedent</a>
                                                <a href="#" class="btn btn-next">Suivant</a>
                                            </div>
                                        </div>

                                        <!-- Photo -->
                                        <div class="step-forms">

                                        <h4 class="">IV.IDENTIFICATION DES ASCENDANTS</h4>
                                        <hr  class="mb-2" style="border: 3px solid green; margin-bottom:3px;"/>
                                        <div class="row mb-3">
                                            <H5 class="mb-2">PERE</H5>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Nom</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nom_pere" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Prenom</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="prenom_pere" id="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Date de naissance</label>
                                                    <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="date_naissance_pere" id="date_naissance_pere">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Lieu de naissance</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="lieu_naissance_pere" id="lieu_naissance_pere">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="row">
                                                <label for="inputText" class="col-sm-4 col-form-label">Etat</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" name="etat_pere"
                                                    id="etat_pere"
                                                    aria-label="Floating label select example">
                                                    <option selected>Etat</option>
                                                    <option value="qctif">Actif</option>
                                                    <option value="non°qctif">Non Actif</option>
                                                    <option value="pensionne">Pensionné</option>
                                                    <option value="decede">Décédé</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <H5 class="mb-2">MERE</H5>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Nom</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nom_mere" id="mom_mere">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Prenom</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="prenom_mere" id="prenom_mere">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Date de naissance</label>
                                                    <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="date_naissance_mere" id="date_maissance_mere">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="inputText" class="col-sm-4 col-form-label">Lieu de naissance</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="lieu_naissance_mere" id="lieu_naissance_mere">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label for="inputText" class="col-sm-4 col-form-label">Etat</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" name="etat_mere"
                                                    id="etat_mere"
                                                    aria-label="Floating label select example">
                                                    <option selected>Etat</option>
                                                    <option value="qctif">Actif</option>
                                                    <option value="non°qctif">Non Actif</option>
                                                    <option value="pensionne">Pensionné</option>
                                                    <option value="decede">Décédé</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="btns-group mt-5">
                                                <a href="#" class="btn btn-prev">Precedent</a>
                                                <button type="submit" id="" class="btn btn-success">Ajouter</button>
                                        </div>
                                            </div>
                                        </div>


                                        <!-- Soummettre -->
                                        {{-- <div class="step-forms">

                                            <div class="btns-group">
                                                <a href="#" class="btn btn-prev">Precedent</a>
                                                <input type="submit" value="Submit" id="" class="btn" />
                                            </div>
                                        </div> --}}


                                {{-- <div class="modal-footer">

                                    <button type="submit" id=""
                                        class="btn btn-success">Ajouter</button>
                                </div> --}}
                            </form>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit"
                            role="tabpanel">

                            <!-- Profile Edit Form -->
                            <form id="VerifierAssureSubmit">
                                <div class="row">
                                    <div class=" col form-floating mb-6">
                                        <input type="text" name="n_affiliation"
                                            class="form-control"
                                            style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                            id="n_affiliation" >
                                        <label for="floatingInput">Numero Affiliation</label>
                                    </div>
                                    <div class="col mb-3">
                                        <button type="button" id="VerificationAssure"  class="btn btn-primary">Verifier</button>
                                    </div>
                                </div>
                            </form>

                            <div class="d-none" id="detailcontainer">
                              <form id="changeEmployeurSubmit">

                                {{-- <input type="hidden" name="employeur_id"  id="employeur_id"> --}}
                                <input type="hidden" name="employer_id" id="employer_id">

                                <div class="row mb-3 text-center "> <h3>Details Sur Employé</h3></div>
                                <div class="row">
                                    <div class="col-8">


                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Prenom</div>
                                            <div class="col-lg-9 col-md-8" id="e_pre_disp"></div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Nom</div>
                                            <div class="col-lg-9 col-md-8" id="e_nom_disp"></div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Matricule</div>
                                            <div class="col-lg-9 col-md-8" id="e_mat_disp"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Numero Immatriculation</div>
                                            <div class="col-lg-9 col-md-8" id="e_n_immatriculation_disp"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Date de Naissance</div>
                                            <div class="col-lg-9 col-md-8" id="e_dob_disp"></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Dernier Employeur</div>
                                            <div class="col-lg-9 col-md-8" id="e_dern_emp_disp"></div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Situation Matrimoniale</div>
                                            <div class="col-lg-9 col-md-8">Marie</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Sexe</div>
                                            <div class="col-lg-9 col-md-8">Male</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Date de Naissance</div>
                                            <div class="col-lg-9 col-md-8">13/05/1998</div>
                                            </div>

                                            <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Lieu de Naissance</div>
                                            <div class="col-lg-9 col-md-8">Conakry</div>
                                        </div> --}}
                                    </div>
                                    <div class="col-4">
                                        <img src="" alt="" srcset="" id="photo_verif" width="150" height="150">
                                    </div>
                                    </div>
                                    <div class="text-center d-flex">
                                        <button type="submit" id=""  class="btn btn-success">Ajout Assuré(e)</button>
                                        <p class="text-danger" style="margin-left:20px"> Voulez-vous changez le matricule de l'assuré(e)?  <span  data-bs-toggle="modal" data-bs-target="#matriculeModal" style="cursor: pointer; color:blue"> Clickez Ici </span></p>
                                    </div>
                                </div>
                            </form>
                        </div>



                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>

        <!-- Modal -->
<div class="modal fade" id="matriculeModal" tabindex="-1" aria-labelledby="matriculeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="matriculeModalLabel">Nouveau Matricule</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <label for="inputText" class="col-sm-4 col-form-label">Nouveau Matricule </label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="nouveau_matricule" id="nouveau_matricule">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="ChangeMatricule()">Changer</button>
        </div>
      </div>
    </div>
  </div>
    <script>
        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const progress = document.getElementById("progress");
        const formSteps = document.querySelectorAll(".step-forms");
        const progressSteps = document.querySelectorAll(".progress-step");


        let formStepsNum = 0;

        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();

            });
        });

        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum--;
                updateFormSteps();
                updateProgressbar();

            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep) => {
                formStep.classList.contains("step-forms-active") &&
                    formStep.classList.remove("step-forms-active");
            });

            formSteps[formStepsNum].classList.add("step-forms-active");
        }

        function updateProgressbar() {
            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum + 1) {
                    progressStep.classList.add("progress-step-active");

                } else {
                    progressStep.classList.remove("progress-step-active");

                }
            });

            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum) {

                    progressStep.classList.add("progress-step-check");
                } else {

                    progressStep.classList.remove("progress-step-check");
                }
            });

            const progressActive = document.querySelectorAll(".progress-step-active");

            progress.style.width =
                ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
        }


        document.getElementById("submit-form").addEventListener("click", function() {

            progressSteps.forEach((progressStep, idx) => {
                if (idx <= formStepsNum) {

                    progressStep.classList.add("progress-step-check");
                } else {

                    progressStep.classList.remove("progress-step-check");
                }
            });

            var forms = document.getElementById("forms");
            forms.classList.remove("form");
            forms.innerHTML =
                '<div class="welcome"><div class="content"><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg><h2>Thanks for signup!</h2><span>We will contact you soon!</span><div></div>';
        });
    </script>

    <script>
        $(document).ready(function() {

            // var docId = $("#doc-id").val();

            var x = document.querySelectorAll("#doc-id");
            console.log(x);
            x.forEach(element => {
                console.log(".btnfile-" + element.value)
                $(".btnfile-" + element.value).on('click', function() {
                    alert('clicked')
                });
            }); //(var i = 0; i < x.length; i++) {

            //   var docID = $("#doc-id").val();
            //   console.log(docID);
            //     // x[i].addEventListener("click", function(){
            //     //   var href = this.attr('href');
            //     //   x[i].style.color = "#006600";
            //     //    alert(href);
            //     // });
            // }

        });
    </script>

<script>
    $(document).ready(function(){

        $('select[name="ville_employer"]').on('change', function(){
            var ville_entreprise = $(this).val();
            //  alert(ville_entreprise)
            if(ville_entreprise) {
                $.ajax({
                    url: "{{  route('get-commune') }}",
                    type:"GET",
                    dataType:"json",
                    data:{ville_entreprise},
                    success:function(data) {

                       var d =$('select[name="commune_employer"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="commune_employer"]').append('<option value="'+ value.id +'">' + value.libelle + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $("#changeEmployeurSubmit").submit(function(e){
                e.preventDefault();
                var employer = $("#employer_id").val();
                // var matriculeGet = $("#matriculeGet").val();
                // console.log(employer);
                $.ajax({
                    type: 'GET',
                    url: "{{ route('change-employeur') }}",
                    dataType: 'json',
                    data:{employer:employer},
                    beforeSend: function(){
                        $("#loader").show();
                    },
                    complete: function(){
                        $("#loader").hide();
                    },
                    success: function(data) {
                        if (data == "exist") {
                            Swal.fire({
                            title: 'Error!',
                            text: 'Ce Numero Matricule existe deja',
                            icon: 'error',

                            })
                        }
                        else{


                            Swal.fire({
                            title: "Succes!",
                            text: "L\'employeur à été changé avec succès",
                            icon: "success",

                            confirmButtonColor: "#3085d6",

                            confirmButtonText: "OK"
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "immatriculation";
                            }
                            });

                        }
                    }
                });
        });

    });

	function chargePhoto(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#photo_disp').attr('src',e.target.result).width(100).height(100);
                $("#photo_wrapper").removeClass('d-none');
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

    $('#VerificationAssure').click(function(){
        var n_affiliation = $('#n_affiliation').val();
        $.ajax({
                    type: 'GET',
                    url: "{{ route('verification-assure') }}",
                    dataType: 'json',
                    data:{n_affiliation:n_affiliation},
                    success: function(data) {
                        if (data === "error") {
                            Swal.fire({
                            title: 'Error!',
                            text: 'Cet Employé n\'est pas libre',
                            icon: 'error',

                            })

                        }
                        else if (data === "no employer") {
                            Swal.fire({
                            title: 'Error!',
                            text: 'Ce Numero d\'immatriculation n\'esiste pas',
                            icon: 'error',

                            })
                        }
                        else{
                            var source = data[0].photo;
                            $("#detailcontainer").removeClass('d-none');
                            $("#e_pre_disp").text(data[0].prenom_employer);
                            $("#e_nom_disp").text(data[0].nom_employer);
                            $("#e_mat_disp").text(data[0].matricule);
                            $("#e_n_immatriculation_disp").text(data[0].n_immatriculation);
                            $("#e_dob_disp").text(data[0].date_naissance_employer);
                            $("#e_dern_emp_disp").text(data[0].entreprises.raison_sociale);
                            $("#employer_id").val(data[0].id);
                            $("#photo_verif").attr('src', source);
                            // console.log(data[0].entreprise_id);
                        }


                    }
                });
        // alert(n_affiliation);
    })
    // function VerificationAssure(){
    //             var n_affiliation = $('#n_affiliation').val();
    //             // alert(n_affiliation)
    //             $.ajax({
    //                 type: 'GET',
    //                 url: "{{ route('verification-assure') }}",
    //                 dataType: 'json',
    //                 data:{n_affiliation:n_affiliation},
    //                 success: function(data) {
    //                     if (data === "error") {
    //                         Swal.fire({
    //                         title: 'Error!',
    //                         text: 'Cet Employé n\'est pas libre',
    //                         icon: 'error',

    //                         })

    //                     }
    //                     else if (data === "no employer") {
    //                         Swal.fire({
    //                         title: 'Error!',
    //                         text: 'Ce Numero d\'immatriculation n\'esiste pas',
    //                         icon: 'error',

    //                         })
    //                     }
    //                     else{
    //                         var source = data[0].photo;
    //                         $("#detailcontainer").removeClass('d-none');
    //                         $("#e_pre_disp").text(data[0].prenom_employer);
    //                         $("#e_nom_disp").text(data[0].nom_employer);
    //                         $("#e_mat_disp").text(data[0].matricule);
    //                         $("#e_n_immatriculation_disp").text(data[0].n_immatriculation);
    //                         $("#e_dob_disp").text(data[0].date_naissance_employer);
    //                         $("#e_dern_emp_disp").text(data[0].entreprises.raison_sociale);
    //                         $("#employer_id").val(data[0].id);
    //                         $("#photo_verif").attr('src', source);
    //                         // console.log(data[0].entreprise_id);
    //                     }


    //                 }
    //             });
    // }


        function ChangeMatricule(){
            var employer_id = $('#employer_id').val();
            var NewMatricule = $('#nouveau_matricule').val();
            // alert(employer_id);
            $.ajax({
                type: 'POST',
                url: "{{ route('change-matricule') }}",
                dataType: 'json',
                data:{employer_id:employer_id,NewMatricule:NewMatricule},
                success: function(data){
                    if (data === "exist") {
                            Swal.fire({
                            title: 'Error!',
                            text: 'Cet Matricule existe déjà',
                            icon: 'error',

                        })

                    }
                    else{
                        Swal.fire({
                            title: "Succes!",
                            text: "Le matricule à été changé avec succè",
                            icon: "success",

                            confirmButtonColor: "#3085d6",

                            confirmButtonText: "OK"
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('charge-ajout-assure') }}";
                            }
                            });

                    }
                }
            });
        }
</script>
</section>
@endsection
