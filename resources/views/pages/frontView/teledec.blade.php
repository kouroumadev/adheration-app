 @extends('pages.frontView.master')
@section('content-front')

<section class="section dashboard">

    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Liste des Cotises</h5>


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
                    <th scope="col">Periode Debut</th>
                    <th scope="col">Periode Fin</th>
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
                      <td>{{ $dem['periode_debut']}}</td>
                      <td>{{ $dem['periode_fin']}} </td>

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

                    <div class="col-md-4 mb-2">
                        <label for="periode_debut" class="form-label">Periode debut</label>
                        <input type="date" name="periode_debut" class="form-control" id="periode_debut">
                      </div>
                      <div class="col-md-4 mb-2">
                          <label for="periode_fin" class="form-label">Periode Fin</label>
                          <input type="date" name="periode_fin" class="form-control" id="periode_fin">
                      </div>
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
                        <input type="text" name="salaire_brut" id="salaire_brut" class="form-control" >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="salaire_soumis" class="form-label">Salaire Soumis a Cotisation</label>
                        <input type="text" name="salaire_soumis" id="salaire_soumis" class="form-control" >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="montant_cotise" class="form-label">Montant des cotisation</label>
                        <input type="text" name="montant_cotise" id="montant_cotise" class="form-control">
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

<script>
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
                    //  console.log(data.employer_id);
                    $("#nom_employer").val(data.nom_employer);
                    $("#prenom_employer").val(data.prenom_employer);
                    $("#employer_id").val(data.employer_id);

                }
            });
        });
    });

    /////// Calcul des cotisations ///////////
    $(document).ready(function(){
        $("#salaire_brut").blur(function(){
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

        })
    });

    $(document).ready(function(){
        $("#cotisationSubmit").submit(function(e){
            e.preventDefault();
            var entreprise_id = $('#entreprise_id').val(); var employer_id = $('#employer_id').val();
            var jour_declare = $('#jour_declare').val(); var periode_debut = $('#periode_debut').val();
            var periode_fin = $('#periode_fin').val(); var salaire_brut = $('#salaire_brut').val();
            var salaire_soumis = $('#salaire_soumis').val(); var montant_cotise = $('#montant_cotise').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('ajout-cotisation') }}",
                dataType: 'json',
                data:{employer_id:employer_id, jour_declare:jour_declare, salaire_soumis:salaire_soumis,
                    periode_fin:periode_fin, entreprise_id:entreprise_id, periode_debut:periode_debut,
                    salaire_brut:salaire_brut, montant_cotise:montant_cotise},
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
