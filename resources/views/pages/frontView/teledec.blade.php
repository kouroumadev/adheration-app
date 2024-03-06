@extends('pages.frontView.master')
@section('content-front')

<section class="section dashboard">

    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Liste des Cotisess</h5>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <div class="row mb-2" style="width: 30%; padding-top: 5px;">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajoutModal"> <i class="bi bi-file-arrow-down-fill"></i> Déclaré Une Cotisation</button>
                </div>
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Salaire Brut</th>
                    <th scope="col">Salaire Soumis A cotisation</th>
                    <th scope="col">Montant cotise</th>
                    <th scope="col">Periode </th>
                    <th scope="col">Annee</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cotisations as $dem )
                  <tr>

                      <td>{{ $dem['employers']['nom_employer'] }}</td>
                      <td>{{ $dem['employers']['prenom_employer']}}</td>
                      <td>{{ $dem['salaire_brut']}} </td>
                      <td>{{ $dem['salaire_soumis'] }}</td>
                      <td>{{ $dem['montant_cotise']}}</td>
                      <td>{{ $dem['mois']}}</td>
                      <td>{{ $dem['annee']}} </td>

                      {{-- <td>
                         <a href="#" class="btn btn-info" onclick="getInfo('{{ $dem['id'] }}')" data-bs-toggle="modal" data-bs-target="#largeModal" > <i class="bi bi-eye"></i> voir</a>
                         <a href="#" class="btn btn-success" onclick="assignId('{{ $dem['id'] }}')" data-bs-toggle="modal" data-bs-target="#basicModal"> <i class="bi bi-check"></i> Approuver</a>

                      </td> --}}
                    </tr>
                  @endforeach


                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>


  <div class="card" style="max-width: 100%">


    {{-- ///////////// MODAL ///// --}}
    <div class="modal fade" id="ajoutModal" tabindex="-1">
        <div class="modal-dialog" style="max-width: 60%">
          <form class="row g-3"  id="cotisationSubmit">
            @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ajout Cotisation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" style="width: 40%; margin:auto">
                    <div class=" col mb-3 form-floating">
                        <select class="form-select" name="n_immat_tele" id="n_immat_tele">
                          <option selected>Selectionnez l'Imatriculation </option>
                          @foreach ($employers as $emp )
                             <option value="{{ $emp->id }}">{{ $emp['n_immatriculation'] }}</option>
                          @endforeach



                        </select>

                    </div>
                </div>
                <div class="row">


                    <input type="hidden" name="entreprise_id" id="entreprise_id" value="{{ $entreprise->id }}">
                    <input type="hidden" name="employer_id" id="employer_id">

                    @if ($entreprise->categorie == "E+20")
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Mois</label>
                                <select class="form-select" name="mois"
                                    id="mois"
                                    aria-label="Floating label select example">
                                    @foreach ($mois as $var )
                                        <option value="{{ $var->id }}">{{ $var->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="">Annee</label>
                                <input type="text" name="anneeMonth" class="form-control" id="anneeMonth">


                            </div>
                        </div>
                    @else
                    <div class="col-md-4 mb-4">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Trimestre</label>
                            <select class="form-select" name="trimestre"
                                id="trimestre"
                                aria-label="Floating label select example">
                                @foreach ($trimestre as $var )
                                    <option value="{{ $var->id }}">{{ $var->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Annee</label>
                            <input type="text" name="anneeTrimestre" class="form-control" id="anneeTrimestre">
                        </div>
                    </div>
                    @endif

                    <hr/>
                    <div class="col-md-6 mb-2">
                      <label for="nom_employer" class="form-label">Nom</label>
                      <input type="text" name="nom_employer" id="nom_employer" class="form-control" >
                    </div>
                    <div class="col-md-6 mb-2">
                      <label for="prenom_employer" class="form-label">Prenom</label>
                      <input type="text" name="prenom_employer" id="prenom_employer" class="form-control" >
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="jour_declare" class="form-label">Jours declares</label>
                      <input type="text" name="jour_declare" class="form-control" id="jour_declare">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="salaire_brut" class="form-label">Salaire Brut</label>
                        <input type="text" name="salaire_brut" id="salaire_brut" class="form-control" disabled >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="salaire_soumis" class="form-label">Salaire Soumis</label>
                        <input type="text" name="salaire_soumis" id="salaire_soumis" class="form-control" disabled >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="montant_cotise" class="form-label">Montant des cotisation</label>
                        <input type="text" name="montant_cotise" id="montant_cotise" class="form-control" disabled>
                    </div>



                </div>


            </div>
            <div class="modal-footer">

              <div class="text-center">
                <button type="submit" class="btn btn-success">Déclarer</button>

              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
</section>
`<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script>
    $("#anneeMonth").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
    $("#anneeTrimestre").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
    //// Getting Employer info ////
    $(document).ready(function(){
        $("#n_immat_tele").change(function(){
           var immatriculation = $("#n_immat_tele").val();
        //    alert(immatriculation)
            $.ajax({
                type: 'GET',
                url: "{{ route('get-employer') }}",
                dataType: 'json',
                data:{immatriculation:immatriculation},
                success: function(data) {
                     console.log(data);
                    $("#nom_employer").val(data.nom_employer);
                    $("#prenom_employer").val(data.prenom_employer);
                    $("#salaire_brut").val(data.salaire_brut);
                    $("#employer_id").val(data.employer_id);

                    var salaireBrut = parseInt($("#salaire_brut").val());
            var salaireSoumise;
            var MontantCotise;

            if (salaireBrut <= 550000) {
                $("#salaire_soumis").val(550000);
                salaireSoumise = 550000
                MontantCotise = (550000 * 0.23)
                $("#montant_cotise").val(MontantCotise)
                // alert(MontantCotise)
            }
            else if (550000 < salaireBrut && salaireBrut <= 2500000) {
                $("#salaire_soumis").val(salaireBrut);
                salaireSoumise = salaireBrut
                MontantCotise = (salaireSoumise * 0.23)
                $("#montant_cotise").val(MontantCotise)
            }
            else{
                $("#salaire_soumis").val(2500000);
                salaireSoumise = 2500000
                MontantCotise = (2500000 * 0.23)
                $("#montant_cotise").val(MontantCotise)
            }

                }
            });
        });
    });



    $(document).ready(function(){
        $("#cotisationSubmit").submit(function(e){
            e.preventDefault();

            var entreprise_id = $('#entreprise_id').val(); var employer_id = $('#employer_id').val();
            var jour_declare = $('#jour_declare').val(); var mois = $('#mois').val(); var anneeMonth = $('#anneeMonth').val();
            var trimestre = $('#trimestre').val(); var salaire_brut = $('#salaire_brut').val();var anneeTrimestre = $('#anneeTrimestre').val();
            var salaire_soumis = $('#salaire_soumis').val(); var montant_cotise = $('#montant_cotise').val();
            //alert(anneeMonth);
            $.ajax({
                type: 'POST',
                url: "{{ route('ajout-cotisation') }}",
                dataType: 'json',
                data:{employer_id:employer_id, jour_declare:jour_declare, salaire_soumis:salaire_soumis,
                    mois:mois, entreprise_id:entreprise_id, trimestre:trimestre, anneeMonth:anneeMonth,
                    salaire_brut:salaire_brut, montant_cotise:montant_cotise,anneeTrimestre:anneeTrimestre},
                success: function(data) {
                    if (data === "success") {

                        // Swal.fire({
                        //     title: 'Succés!',
                        //     text: 'Cotisé avec Succès',
                        //     icon: 'success',
                        // })
                        Swal.fire({
                        title: "Succés!",
                        text: "Cotisé avec Succès",
                        icon: "success",

                        confirmButtonColor: "#3085d6",

                        confirmButtonText: "OK"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "tele-dec";
                        }
                        });
                    }
                    else{
                        Swal.fire({
                            title: 'Erreur!',
                            text: 'La cotisation à été déjà declarer pour cet employé',
                            icon: 'error',
                        })
                    }

                }
            });
        });
    });
</script>


@endsection
