@extends('pages.frontView.master')
@section('content-front')
    <section class="section dashboard">

        <div id="loader"></div>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Liste des Employés</h5>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <div class="row mb-2" style="width: 200px;">
                                <a  href=" {{ route('charge-ajout-assure') }}" class="btn btn-success" > <i
                                        class="bi bi-save"></i> Ajout Employer</a>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">Numéro Affiliation</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date de Naissance</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employers as $dem)
                                    <tr>

                                        <td> <a href="{{ route('employer-detail',$dem['id']) }}"> {{ $dem['n_immatriculation'] }}</a></td>
                                        <td>{{ $dem['matricule'] }}</td>
                                        <td>{{ $dem['prenom_employer'] }}</td>
                                        <td>{{ $dem['nom_employer'] }}</td>
                                        <td>{{ $dem['date_naissance_employer'] }}</td>
                                        <td><button  class="btn btn-danger rounded-pill" id="{{ $dem['id'] }}"  data-bs-toggle="modal" data-bs-target="#libererModal{{ $dem['id'] }}">Sortie</button></td>



                                        <div class="modal fade" id="libererModal{{ $dem['id'] }}" tabindex="-1" aria-labelledby="libererModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <form method="post" action="{{ route('immatriculation-emp-leave') }}"  id="">
                                                    @csrf
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Validation de la sortie</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Mois</label>
                                                            <select class="form-select" name="months_id" required>
                                                                @foreach ($mois as $m)
                                                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            {{-- <input type="text" class="form-control" id="matriculeGet" name="matriculeGet" placeholder="matricule"> --}}
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Annee</label>
                                                            <input type="text" name="year" class="form-control datepicker" id="datepicker" required>
                                                            <input type="hidden" value="{{ $dem->id }}" name="employee_id" id="employee_id">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Motif</label>
                                                            <select class="form-select" name="motif" required>
                                                                <option value="licenciment">Licenciment</option>
                                                                <option value="fin_de_contrat">Fin de contrat</option>
                                                                <option value="changement_employer">Changement d'employer</option>

                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="submit" class="btn btn-success">Valider</button>
                                                </div>
                                              </div>
                                            </form>
                                            </div>
                                        </div>


                                    @endforeach
                                    </tr>


                                {{-- {{ route('liberer-employer', $dem['id']) }} --}}

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>



                <div class="modal fade" id="addEmployer" tabindex="-1">
                    <div class="modal-dialog" style="max-width: 90%">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajout Employer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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


                            </div>


                        </div>
                    </div>
                </div>

                <!-- Modal change matricule -->
<div class="modal fade" id="matriculeModal" tabindex="-1" aria-labelledby="matriculeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  id="changeEmployeurSubmit">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Changement de Matricule</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Matricule</label>
                <input type="text" class="form-control" id="matriculeGet" name="matriculeGet" placeholder="matricule">
              </div>
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-success">Changer employeur</button>
        </div>
      </div>
    </form>
    </div>
</div>


</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <script>
        function assignEmpId(value) {
            document.getElementById('employee_id').value = value;
        }
    </script>
    <script>
        $(".datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>

    <script>


        $(document).ready(function(){

            // $("#VerifierAssureSubmit").submit(function(e){
            //     e.preventDefault();
            //     var n_affiliation = $('#n_affiliation').val();
            //     // alert(n_affiliation)
            //     $.ajax({
            //         type: 'GET',
            //         url: "{{ route('verification-assure') }}",
            //         dataType: 'json',
            //         data:{n_affiliation:n_affiliation},
            //         success: function(data) {
            //             if (data === "error") {
            //                 Swal.fire({
            //                 title: 'Error!',
            //                 text: 'Cet Employé n\'est pas libre',
            //                 icon: 'error',

            //                 })

            //             }
            //             else if (data === "no employer") {
            //                 Swal.fire({
            //                 title: 'Error!',
            //                 text: 'Ce Numero d\'immatriculation n\'esiste pas',
            //                 icon: 'error',

            //                 })
            //             }
            //             else{
            //                 $("#detailcontainer").removeClass('d-none');
            //                 $("#e_pre_disp").text(data[0].prenom_employer);
            //                 $("#e_nom_disp").text(data[0].nom_employer);
            //                 $("#e_mat_disp").text(data[0].matricule);
            //                 $("#e_n_immatriculation_disp").text(data[0].n_immatriculation);
            //                 $("#e_dob_disp").text(data[0].date_naissance_employer);
            //                 $("#e_dern_emp_disp").text(data[0].entreprises.raison_sociale);
            //                 $("#employer_id").val(data[0].id);
            //                 // $("#employeur_id").val(data[0].entreprise_id);
            //                 // console.log(data[0].entreprise_id);
            //             }


            //         }
            //     });
            // });

            // $("#changeEmployeurSubmit").submit(function(e){
            //     e.preventDefault();
            //     var employer = $("#employer_id").val();
            //     var matriculeGet = $("#matriculeGet").val();
            //     // console.log(matriculeGet);
            //     $.ajax({
            //         type: 'GET',
            //         url: "{{ route('change-employeur') }}",
            //         dataType: 'json',
            //         data:{employer:employer,matricule:matriculeGet},
            //         beforeSend: function(){
            //             $("#loader").show();
            //         },
            //         complete: function(){
            //             $("#loader").hide();
            //         },
            //         success: function(data) {
            //             if (data == "exist") {
            //                 Swal.fire({
            //                 title: 'Error!',
            //                 text: 'Ce Numero Matricule existe deja',
            //                 icon: 'error',

            //                 })
            //             }
            //             else{
            //                 Swal.fire({
            //                 title: 'Succes!',
            //                 text: 'L\'employeur à été changé avec succès',
            //                 icon: 'success',

            //                 })

            //                 Swal.fire({
            //                 title: "Succes!",
            //                 text: "L\'employeur à été changé avec succès",
            //                 icon: "success",

            //                 confirmButtonColor: "#3085d6",

            //                 confirmButtonText: "OK"
            //                 }).then((result) => {
            //                 if (result.isConfirmed) {
            //                     window.location.href = "immatriculation";
            //                 }
            //                 });

            //             }
            //         }
            //     });
            // });


        });

        // function Libre(id){
        //   var id = id;
        //     Swal.fire({
        //             title: "Etes Vous Sure?",
        //             text: "Vous ne pourrez pas revenir en arrière!",
        //             icon: "warning",
        //             showCancelButton: true,
        //             confirmButtonColor: "#3085d6",
        //             cancelButtonColor: "#d33",
        //             confirmButtonText: "Oui, Liberer !"
        //             }).then((result) => {
        //             if (result.isConfirmed) {

        //                 $.ajax({
        //                     type: 'GET',
        //                     url: "{{ route('liberer-employer') }}",
        //                     dataType: 'json',
        //                     data:{id:id},

        //                     success: function(data) {

        //                     }
        //                 });

        //                 // Swal.fire({
        //                 // title: "Liberé!",
        //                 // text: "Cet employé à été libré.",
        //                 // icon: "success"
        //                 // });

        //                 Swal.fire({
        //                 title: "Liberé!",
        //                 text: "Cet employé à été libré.",
        //                 icon: "success",

        //                 confirmButtonColor: "#3085d6",

        //                 confirmButtonText: "OK"
        //                 }).then((result) => {
        //                 if (result.isConfirmed) {
        //                     window.location.href = "immatriculation";
        //                 }
        //                 });

        //             }
        //     });
        // }
    </script>
@endsection
