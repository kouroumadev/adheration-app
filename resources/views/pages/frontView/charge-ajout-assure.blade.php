@extends('pages.frontView.master')
@section('content-front')

<section class="main">
    <div class="col-xl-12">
        <div class="card" style="max-width:100%">
            <div class="card-body pt-3">
                <hr style="border: 4px solid green"/>
                <h3 class="mb-2">I. IDENTIFICATION DE L'ASSURE(E)</h3>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">N Matricule Chez l'employeur</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nom Naissance</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Prénoms</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Date de Naissance</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                            <div class="col-sm-10 d-flex">
                              <div class="form-check">
                                <label class="form-check-label" for="gridRadios1">
                                    Femme
                                  </label>
                                <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios1" value="option1" checked="">

                              </div>
                              <div class="form-check " style="margin-left: 25px">
                                <label class="form-check-label" for="gridRadios2">
                                    Homme
                                  </label>
                                <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios2" value="option2">

                              </div>

                            </div>
                          </fieldset>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Lieu de naissance</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Pays de naissance</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Situation matrimoniale</label>
                    <div class="col-sm-8 d-flex">
                        <div class="form-check">
                            <label class="form-check-label" for="gridRadios1">
                                Célibataire
                              </label>
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios1" value="option1" checked="">

                          </div>
                          <div class="form-check " style="margin-left: 25px">
                            <label class="form-check-label" for="gridRadios2">
                                Marié(e)
                              </label>
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios2" value="option2">

                          </div>
                          <div class="form-check" style="margin-left: 25px">
                            <label class="form-check-label" for="gridRadios1">
                                Divorcé(e)
                              </label>
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios1" value="option1">

                          </div>
                          <div class="form-check " style="margin-left: 25px">
                            <label class="form-check-label" for="gridRadios2">
                                Veuf/veuve
                              </label>
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios2" value="option2">

                          </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Nationalié</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Ville actuel</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Commune actuel</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Quartier actuel</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">E-mail</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">N Téléphone</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>

                <hr style="border: 4px solid green; margin-top:5px"/>
                <h3 class="mb-2">II. TYPE ASSURE(E)</h3>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Situation matrimoniale</label>
                    <div class="col-sm-8 d-flex">
                        <div class="form-check">
                            <label class="form-check-label" for="gridRadios1">
                                Normal
                              </label>
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios1" value="option1" checked="">

                          </div>
                          <div class="form-check " style="margin-left: 25px">
                            <label class="form-check-label" for="gridRadios2">
                               Temporaire
                              </label>
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios2" value="option2">

                          </div>
                          <div class="form-check" style="margin-left: 25px">
                            <label class="form-check-label" for="gridRadios1">
                                Apprenti
                              </label>
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios1" value="option1">

                          </div>
                          <div class="form-check " style="margin-left: 25px">
                            <label class="form-check-label" for="gridRadios2">
                               Handicapé
                              </label>
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios2" value="option2">

                          </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Date d'embauche</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Rénumération brute mensuelle</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Emploi occupé</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Qualification professionelle</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>

                <hr style="border: 4px solid green; margin-top:5px"/>
                <h3 class="mb-2">III.PIECES A JOINDRE</h3>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Passeport/CIN</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Delivrée le</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">à</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>

                <hr style="border: 4px solid green; margin-top:5px"/>
                <h3 class="mb-2">IV.IDENTIFICATION DES ASCENDANTS</h3>


            </div>

        </div>
    </div>
    <div class="col-xl-12">

        <div class="card" style="max-width:100%">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab"
                            data-bs-target="#profile-overview" aria-selected="true"
                            role="tab">Nouveau</button>
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
                        <form id="submitEmployerBtn"  class="mb-3">
                            <input type="hidden" name="entreprise_id" id="entreprise_id"
                                value="{{ $entreprise_id }}">

                            {{-- <input type="hidden" name="token" id="token" value="{{ @csrt_token }}"> --}}

                            <h5 class="card-title">Ajouté un Nouveau assuré</h5>

                            <div class="row">
                                <div class=" col form-floating mb-3">
                                    <input type="text" class="form-control"
                                        name="prenom_employer"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="prenom_employer" placeholder required="name@example.com">
                                    <label for="floatingInput">Prenom</label>
                                    @error('prenom_employer')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="text" class="form-control"
                                        name="nom_employer"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="nom_employer" placeholder required="name@example.com">
                                    <label for="floatingInput">Nom</label>
                                </div>
                                <div class=" col mb-3 form-floating">
                                    <select class="form-select" name="sexe_employer"
                                        id="sexe_employer"
                                        aria-label="Floating label select example">
                                        <option selected>Selectionnez le sexe</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>

                                </div>

                            </div>
                            <div class="row">
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="matricule" class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="matricule" placeholder required="name@example.com">
                                    <label for="floatingInput">Matricule</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="email" name="email_employer"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="email_employer" placeholder required="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="date" name="date_embauche"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="date_embauche" placeholder required="name@example.com">
                                    <label for="floatingInput">Date embauche</label>
                                </div>
                                <div class=" col mb-3 form-floating">
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
                            <div class="row">
                                <div class=" col form-floating mb-3">
                                    <select class="form-select" name="nationalite"
                                        id="nationalite"
                                        aria-label="Floating label select example">
                                        <option selected>Selectionnez la nationalité</option>
                                        <option value="guinee">Guineé</option>
                                        <option value="cote divoire">Cote d'ivoire</option>
                                        <option value="senegal">Senegal</option>
                                        <option value="france">France</option>

                                    </select>
                                    {{-- <input type="text" name="nationalite"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="nationalite" placeholder required="name@example.com">
                                    <label for="floatingInput">Nationalite</label> --}}
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="date" name="date_naissance_employer"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="date_naissance_employer"
                                        placeholder required="name@example.com">
                                    <label for="floatingInput">Date Naissance</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="lieu_naissance_employer"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="lieu_naissance_employer"
                                        placeholder required="name@example.com">
                                    <label for="floatingInput">Lieu Naissance</label>
                                </div>
                                <div class=" col mb-3 form-floating">
                                    <select class="form-select" name="etat_employer"
                                        id="etat_employer"
                                        aria-label="Floating label select example">
                                        <option selected>selectionnez l'etat</option>
                                        <option value="actif">Actif</option>
                                        <option value="inactif">Inactif</option>

                                    </select>

                                </div>

                            </div>
                            <div class="row">
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="prenom_pere"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="prenom_pere" placeholder required="name@example.com">
                                    <label for="floatingInput">Prenom Pere</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="nom_pere"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="nom_pere" placeholder required="name@example.com">
                                    <label for="floatingInput">Nom Pere</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="prenom_mere"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="prenom_mere" placeholder required="name@example.com">
                                    <label for="floatingInput">Prenom Mere</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="nom_mere"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="nom_mere" placeholder required="name@example.com">
                                    <label for="floatingInput">Nom Mere</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="profession"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="profession" placeholder required="name@example.com">
                                    <label for="floatingInput">Profession</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="n_cin" class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="n_cin" placeholder required="name@example.com">
                                    <label for="floatingInput">Numero CIN</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="date" name="date_del_cin"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="date_del_cin" placeholder required="name@example.com">
                                    <label for="floatingInput">Date Delivrance CIN</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="lieu_del_cin"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="lieu_del_cin" placeholder required="name@example.com">
                                    <label for="floatingInput">Lieu Delivrance CIN</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="n_acte_naissance"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="n_acte_naissance" placeholder required="name@example.com">
                                    <label for="floatingInput">Numero acte_naissance</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="date" name="date_del_acte_naissance"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="date_del_acte_naissance"
                                        placeholder required="name@example.com">
                                    <label for="floatingInput">Date Delivrance
                                        acte_naissance</label>
                                </div>
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="lieu_del_acte_naissance"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="lieu_del_acte_naissance"
                                        placeholder required="name@example.com">
                                    <label for="floatingInput">Lieu Delivrance CIN</label>
                                </div>

                                <div class=" col mb-3 form-floating">
                                    <textarea class="form-control" name="adresse_employer"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        placeholder required="Leave a comment here" id="adresse_employer" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Adresse</label>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="submit" id=""
                                    class="btn btn-success">Ajouter</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit"
                        role="tabpanel">

                        <!-- Profile Edit Form -->
                        <form id="VerifierAssureSubmit">
                            <div class="row">
                                <div class=" col form-floating mb-3">
                                    <input type="text" name="n_affiliation"
                                        class="form-control"
                                        style="border:none; border-bottom: 1px solid black; background: #e9ecefa4 !important"
                                        id="n_affiliation" placeholder required="name@example.com" required>
                                    <label for="floatingInput">Numero Affiliation</label>
                                </div>
                                <div class="col mb-3">
                                    <button type="submit" class="btn btn-primary">Verifier</button>
                                </div>
                            </div>
                        </form>

                        <div class="d-none" id="detailcontainer">
                            {{-- <input type="hidden" name="employeur_id"  id="employeur_id"> --}}
                            <input type="hidden" name="employer_id" id="employer_id">

                            <div class="row mb-3 text-center"> <h3>Details Sur Employé</h3></div>
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


                            <div class="text-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#matriculeModal" class="btn btn-success">Changer Le matricule</button>
                            </div>
                        </div>

                    </div>



                </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </div>

</section>

@endsection
