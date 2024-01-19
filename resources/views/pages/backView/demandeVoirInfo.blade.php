@extends('pages.backView.master')
@section('back-content')
@php
use Illuminate\Support\Facades\DB;
$branches = DB::table('branche')->where('id',$entreprise->activite_principale)->get();
$prefecture = DB::table('prefecture')->where('id',$entreprise->ville_entreprise)->get();
$communes = DB::table('communes')->where('id',$entreprise->commune_entreprise)->get();
// dd($prefecture[0]->libelle);
@endphp
<div id="loader"></div>
<section class="section">
     <div class="row">
        <div class="m-auto mb-3" style="width: 150px; margin:auto">
            <img src="{{ asset($entreprise->sigle )}}" alt="" width="150" height="150">
        </div>
        <h1 class="text-center">{{ $entreprise->raison_sociale }}</h1>
    </div>

    {{--<div class="row">
        <div class="col-lg-3 col-md-4 label font-weight-bold ">RCCM:</div>
        <div class="col-lg-9 col-md-8" id="">{{ $entreprise->num_agrement }}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label font-weight-bold">Numero Impot:</div>
        <div class="col-lg-9 col-md-8" id="">{{ $entreprise->num_impot }}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label font-weight-bold ">Activité:</div>
        <div class="col-lg-9 col-md-8" id=""></div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label font-weight-bold">Ville:</div>
        <div class="col-lg-9 col-md-8" id="re_commune_entreprise"></div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label font-weight-bold">Commune:</div>
        <div class="col-lg-9 col-md-8" id="re_commune_entreprise"></div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label font-weight-bold ">Quartier:</div>
        <div class="col-lg-9 col-md-8" id="re_quartier_entreprise"></div>
    </div> --}}


    <!-- Table with stripped rows -->
    <table class="table">




        <tbody>
            <tr>
                <th>RCCM:</th>
                <td>{{ $entreprise->num_agrement }}</td>
            </tr>
            <tr>
                <th>Numero Impot:</th>
                <td> {{ $entreprise->num_impot }}</td>
            </tr>
                <tr>
                    <th>Activité:</th>
                    <td>{{ $branches[0]->libelle }}</td>
                </tr>
            <tr>
                <th>Ville:</th>
                <td>{{ $prefecture[0]->libelle }}</td>
            </tr>
            <tr>
                <th>Commune:</th>
                <td>{{ $communes[0]->libelle }} </td>
            </tr>
                <tr>
                    <th>Quartier:</th>
                    <td>{{ $entreprise->quartier_entreprise }} </td>
                </tr>
                <tr>


                    <th>RCCM</th>
                    <td>
                        <button  class="btn btn-danger rounded-pill" id="{{ $entreprise['id'] }}" onclick="rccmView(this.id)" data-bs-toggle="modal" data-bs-target="#rccm-check">Voir
                        </button>
                    </td>
                </tr>
                <tr>


                    <th>Impot</th>
                    <td><button  class="btn btn-danger rounded-pill" id="{{ $entreprise['id'] }}" onclick="impotView(this.id)" data-bs-toggle="modal" data-bs-target="#rccm-check">Voir
                    </button></td>
                </tr>


        </tbody>
    </table>
    <div class="row w-50 m-auto">
        <button type="button" class="btn btn-primary " id="{{ $entreprise['id'] }}" onclick="assignId(this.id)" data-bs-toggle="modal" data-bs-target="#basicModal">Immatriculation</button>
    </div>
    <div class="modal fade" id="rccm-check" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="width:600px; height:700px">
                <div class="modal-header">
                    <h5 class="modal-title" id="rccm_type_ap"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    {{-- <embed src="storage/upload/rccmument/Acte de naissance_62.pdf" type="application/pdf" width="100%" height="100%"> --}}

            <iframe id="rccmpath"  src="" width="100%" height="100%" frameborder="0"></iframe>

                </div>

            </div>
        </div>
    </div>
{{--////////// IMMATRICULATION MODAL /////// --}}
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog" >


          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Numero d'Immatriculation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-8" >

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
    <!--//////// CONFIRMATION MODAL ////// -->
    <div class="modal fade" id="confirmImmat" tabindex="-1">
        <form id="AjoutNumAffil">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Confirmation d'Immatriculation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">

                    <div class="row">
                        <div class="col-12" >
                            <div class="row" style="width: 150px; margin:auto">
                                <img src="{{ asset('images/Warning.png') }}" width="150" height="150" alt="">
                            </div>
                            <div class="row">
                                <p>Etes vous sure de vouloir confirmer ce numero d'immatriculation? <strong id="disp_immat" class="text-bold" style="color: black"></strong></p>
                            </div>

                        </div>

                      </div>


                      <input type="hidden" name="assigned_immatriculation" id="assigned_immatriculation">
                      <input type="hidden" id="ass_id" name="ass_id" value="{{ $entreprise['id'] }}">
                      <input type="hidden" id="demande_id" name="demande_id" value="{{ $demande['id'] }}">
                      <input type="hidden" name="sequence_num" id="sequence_num">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-success">Approuver</button>
                </div>

            </div>
        </div>
        </form>
    </div>

    <script>
        function rccmView(doc_id) {
            var mydoc_id = doc_id;
            //   alert(mydoc_id)
            $.ajax({
                type: 'GET',
                url: "{{ route('doc-view-rccm') }}",
                dataType: 'json',
                data:{doc_id:mydoc_id},
                success: function(data) {
                    console.log(data.rccm)
                    $("#doc_type_ap").text(data.document_type);
                 $('#rccmpath').attr('src',data.rccm);
                }
            })
        }
        function impotView(doc_id) {
            var mydoc_id = doc_id;
            //   alert(mydoc_id)
            $.ajax({
                type: 'GET',
                url: "{{ route('doc-view-impot') }}",
                dataType: 'json',
                data:{doc_id:mydoc_id},
                success: function(data) {
                    // console.log(data.rccm)
                    $("#doc_type_ap").text(data.document_type);
                 $('#rccmpath').attr('src',data.impot);
                }
            })
        }

        function assignId(id){
        // $('#ass_id').val(id);
        var id = id;
         //alert(id)
        $.ajax({
            type:'GET',
            url:"{{ route('get-num-immatriculation') }}",
            dataType: 'json',
            data:{id:id},
            success: function(data){
                console.log(data);
                if (data.alert === 'success') {
                    $("#n_immatriculation").val(data.n_immatriculation);
                    $("#disp_immat").text(data.n_immatriculation);
                    $("#sequence_num").val(data.sequence);
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
           var demande_id =  $('#demande_id').val();
           var sequence_num =  $('#sequence_num').val();
            //  alert(id)
            $.ajax({
                type: 'POST',
                url: "{{ route('ajout-num-aff') }}",
                dataType: 'json',
                data:{immatriculation:immatriculation,id:id,demande_id:demande_id,sequence_num:sequence_num},
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
                            window.location.replace("{{ route('demande-non-approuve') }}");
                        }
                    });
                    }
                }
            });
        });
    });
    </script>
</section>
@endsection
