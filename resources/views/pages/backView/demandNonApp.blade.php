@extends('pages.backView.master')
@section('back-content')

@php
   $number = \App\Models\User::where('n_affiliation','!=',null)->orderBy('id','DESC')->first();
    // dd($number);
    $n_affiliation_store = 0;
   if ($number == null) {
    $n_affiliation_store = 0;
   } else {
    $n_affiliation_store = $number->n_affiliation;
   }

//    dd($number);
//    $n_affiliation_store = $number->n_affiliation_store;
@endphp

<section class="section">
            <div id="loader"></div>
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Demandes Non Approuvées</h5>


            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Raison Sociale</th>
                  <th scope="col">No Employes</th>
                  <th scope="col">Representant</th>
                  <th scope="col">Date demande</th>
                  <th scope="col">Action</th>
                  {{-- <th scope="col">Start Date</th> --}}
                </tr>
              </thead>
              <tbody>
                @if (!empty($demande))


                @foreach ($demande as $dem )
                <tr>

                    <td>{{ $dem['entreprises']['raison_sociale'] }}</td>
                    <td>{{ $dem['entreprises']['nombre_emp'] }}</td>
                    <td>{{ $dem['representants']['prenom'] }} {{ $dem['representants']['nom'] }}</td>
                    <td>{{ $dem['created_at'] }}</td>
                    <td>
                       <a href="#" class="btn btn-info" onclick="getInfo('{{ $dem['id'] }}')" data-bs-toggle="modal" data-bs-target="#largeModal" > <i class="bi bi-eye"></i> voir</a>
                       <a href="#" class="btn btn-success" onclick="assignId('{{ $dem['id'] }}')" data-bs-toggle="modal" data-bs-target="#basicModal"> <i class="bi bi-check"></i> Approuver</a>

                    </td>
                  </tr>
                @endforeach
                @else
                <td>Pas de Donner</td>
                @endif


              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
    {{-- Entreprise details modal --}}
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true" style="display: none;" >
        <div class="modal-dialog" style="max-width: 60%">
          <div class="modal-content" >
            <div class="modal-header">
              <h5 class="modal-title">Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-center mb-3"> Entreprise</h5>
                        <table class="table">

                            <tbody>
                                <tr>
                                    <th>Raison Sociale:</th>
                                    <td id="r_sociale"></td>
                                </tr>
                                <tr>
                                    <th>Nom Complet Du Representant:</th>
                                    <td id="nom_rep"></td>
                                  </tr>
                                  <tr>
                                    <th>Telephone:</th>
                                    <td id="phone_rep"></td>
                                  </tr>
                                  <tr>
                                    <th>Adresse:</th>
                                    <td id="adresse_rep"></td>
                                  </tr>
                                  <tr>
                                    <th>No d'identite:</th>
                                    <td id="identite_rep"></td>
                                  </tr>
                            </tbody>
                          </table>

                    </div>
                    {{-- <div class="col-6">
                        <h5 class="text-center mb-3"> Representant</h5>
                        <table class="table">

                            <tbody>
                              <tr>
                                <td>Nom Complet:</td>
                                <td id="nom_rep"></td>
                              </tr>
                              <tr>
                                <td>Telephone:</td>
                                <td id="phone_rep"></td>
                              </tr>
                              <tr>
                                <td>Adresse:</td>
                                <td id="adresse_rep"></td>
                              </tr>
                              <tr>
                                <td>N0 d'identite:</td>
                                <td id="identite_rep"></td>
                              </tr>

                            </tbody>
                          </table>

                    </div> --}}
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
          </div>
        </div>
      </div>
{{-- Immatriculation getting modal --}}
      <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog" style="max-width: 60%">


          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Numero d'affiliation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-8" >
                      <p class="text-center mb-4"> Numero d'immatriculation</p>
                      <div class="row">
                          <input type="text" class="form-control m-auto" name="n_immatriculation" id="n_immatriculation"  disabled style="width: 80%" >
                      </div>
                      <p class="text-danger d-none text-center" id="error"></p>
                  </div>
                  {{-- <div class="col-4">
                    <p class="text-bold"> Dernier No Affiliation : {{ $n_affiliation_store }} </p>
                  </div> --}}
                </div>

            {{-- Hidden input for getting demande id --}}
                {{-- <input type="hidden" name="ass_id" id="ass_id"> --}}
            </div>
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" onclick="approuver()" class="btn btn-primary">Save changes</button> --}}
              <button type="button" class="btn btn-primary" onclick="ConfirmationClicked()" data-bs-toggle="modal" data-bs-target="#confirmImmat">confirmation</button>
            </div>
          </div>

        </div>
      </div>
{{-- Approuve Immatriculation modal --}}
<div class="modal fade" id="confirmImmat" tabindex="-1">
    <div class="modal-dialog" style="max-width: 60%">
        <form  id="AjoutNumAffil">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation d'immatriculation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-8" >
                  <p class="text-center mb-4"> Numero d'immatriculation</p>
                  <div class="row">
                      <p>Etes vous sure de voiloir confirmer ce numero d'immatriculation? <span id="disp_immat" class="text-bold"></span></p>
                  </div>
                  {{-- <p class="text-danger d-none text-center" id="error"></p> --}}
              </div>

            </div>

        {{-- Hidden input for getting demande id and assigned Immatriculation --}}
            <input type="hidden" name="assigned_immatriculation" id="assigned_immatriculation">
            <input type="hidden" name="ass_id" id="ass_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-success">Approuver</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  </section>

  <script>
    function assignId(id){
        $('#ass_id').val(id);
        var id = id;
        // alert(id)
        $.ajax({
            type:'GET',
            url:"{{ route('get-num-immatriculation') }}",
            dataType: 'json',
            data:{id:id},
            success: function(data){
                if (data.alert === 'success') {
                    $("#n_immatriculation").val(data.n_immatriculation);
                    $("#disp_immat").text(data.n_immatriculation);
                }
                // console.log(data.alert)
            }
        })
    }

    function ConfirmationClicked(){
        $number_assigned = $("#n_immatriculation").val()
        $("#assigned_immatriculation").val($number_assigned);
    }
    $(document).ready(function(){
        $("#AjoutNumAffil").submit(function(e){
            e.preventDefault();
           var immatriculation = $("#assigned_immatriculation").val();
           var id =  $('#ass_id').val();
            // alert(immatriculation)
            $.ajax({
                type: 'POST',
                url: "{{ route('ajout-num-aff') }}",
                dataType: 'json',
                data:{immatriculation:immatriculation, id:id},
                beforeSend: function(){
                        $("#loader").show();
                },
                    complete: function(){
                        $("#loader").hide();
                },
                success: function(data) {

                    // console.log(data)
                    if (data === "exist") {
                        // alert("data")
                        Swal.fire({
                        title: 'Error!',
                        text: 'Le numero d\'immatriculation existe déja',
                        icon: 'error',
                        })
                    }

                    else {
                        Swal.fire({
                        title: "valide!",
                        text: "La démande à été accepté",
                        icon: "success",

                        confirmButtonColor: "#3085d6",

                        confirmButtonText: "OK"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "demande-non-approuve";
                        }
                    });
                    }
                }
            });
        });
    });
  </script>
@endsection
