@extends('pages.frontView.master')
@section('content-front')

<section class="section Profile">


    <div class="row mb-3 m-auto">
        <div class="col-xl-6 w-100">

            <div class="card w-100">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{ asset('images/person_3.jpg') }}"  width="150" height="150" alt="Profile" class="rounded-circle">
                <div class="row w-50 mt-5">
                    <div class="col-lg-6 col-md-6 label text-dark text-uppercase ">Nom Complet :</div>
                    <div class="col-lg-6 col-md-6">{{ $employer[0]['prenom_employer'] }} {{ $employer[0]['nom_employer'] }}</div>
                  </div>

                  <div class="row w-50">
                    <div class="col-lg-6 col-md-6 label text-dark text-uppercase">Matricule :</div>
                    <div class="col-lg-6 col-md-6">{{ $employer[0]['matricule'] }}</div>
                  </div>

                  <div class="row w-50">
                    <div class="col-lg-6 col-md-6 label text-dark text-uppercase">Numero Immatriculation :</div>
                    <div class="col-lg-6 col-md-6">{{ $employer[0]['n_immatriculation'] }}</div>
                  </div>
                  <div class="row w-50">
                    <div class="col-lg-6 col-md-6 label bold text-uppercase">Dernier Employeur :</div>
                    <div class="col-lg-6 col-md-6">{{ $employer[0]['entreprises']['raison_sociale'] }}</div>
                  </div>

              </div>
            </div>

          </div>

    </div>

    <div class="row">
        <div class="col-lg-9 m-auto">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Details Cotisation</h5>

              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">
                @foreach ($grouped as $key => $cot )


                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading{{ $key }}">
                    <button class="accordion-button" type="button" style="background-color: rgba(152, 160, 152, 0.39); color: black"  data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                      {{ $cot['entreprises']['raison_sociale'] }}
                    </button>
                  </h2>
                  <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row m-auto mb-3" style="width: 30%">
                            <a href="{{ route('releve-par-entreprise',['entreprise_id'=>$cot["entreprises"]['id'],'employer_id'=>$employer[0]['id'] ]) }}" class="btn btn-danger rounded-pill" style="">Rélévé</a>
                        </div>
                        <table class="table ">

                            <thead>
                              <tr>

                                <th scope="col">Date Effet</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Annee</th>
                                <th scope="col">Salaire Brut</th>
                                <th scope="col">Sailaire Soumis</th>
                                <th scope="col">Montant Cotise</th>
                                <th scope="col">Part Salariale</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($cot->children as $child )

                                    @php
                                        $categorie =  $child['entreprises']['categorie'];

                                        $period = \Carbon\CarbonPeriod::create(date('F', strtotime($child["periode_debut"])), '1 month', date('F', strtotime($child["periode_fin"])));
                                        $part_salariale = ((int)$child["salaire_soumis"] * 0.05);
                                    @endphp
                              <tr>


                                <td>{{date('d-M-Y',strtotime($child["created_at"]))  }}</td>
                                @if ($categorie == "E-20")
                                <td>
                                 @foreach ($period as $pd )
                                     {{ date('M', strtotime($pd)) }}-
                                 @endforeach
                               </td>
                                @else
                                <td>

                                  {{ date('F', strtotime($child["periode_fin"])) }}
                               </td>
                                @endif

                                    <td>{{ date('Y', strtotime($child["periode_fin"])) }}</td>

                                <td>{{ number_format($child["salaire_brut"] )}}</td>
                                <td>{{ number_format($child["salaire_soumis"]) }}</td>
                                <td>{{ number_format($child["montant_cotise"]) }}</td>
                                <td>{{ number_format($part_salariale) }}</td>
                                </tr>

                                @endforeach

                            </tbody>
                          </table>
                    </div>
                  </div>
                </div>
                @endforeach

              </div><!-- End Default Accordion Example -->

            </div>
          </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 m-auto">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title">Total Cotisation Par Employeur</h5>

                    <table class="table ">

                        <thead>
                          <tr>

                            <th scope="col">Employeur</th>
                            <th scope="col">Total Brut</th>
                            <th scope="col">Total Soumis</th>
                            <th scope="col">Total Cotise</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($cotisation as $cot )


                          <tr>


                              <td>{{ $cot["raison_sociale"] }} </td>
                              <td>{{ number_format($cot["total_brut"] )}}</td>
                              <td>{{ number_format($cot["total_soumis"] )}}</td>
                              <td>{{ number_format($cot["total_cotise"]) }}</td>



                            </tr>

                            @endforeach

                        </tbody>
                        <tfoot>
                            <th scope="col">Total</th>
                            <th scope="col">{{ number_format($total_brut) }}</th>
                            <th scope="col">{{ number_format($total_soumis )}}</th>
                            <th scope="col">{{ number_format($total_cotise) }}</th>
                        </tfoot>
                    </table>
                </div>


               </div>
        </div>
    </div>
    {{-- <div class="card">
    <table class="table datatable">

        <thead>
          <tr>

            <th scope="col">Employeur</th>
            <th scope="col">Total Brut</th>
            <th scope="col">Total Cotise</th>
            <th scope="col">Periode</th>
            <th scope="col">Mois</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cotisation as $cot )


          <tr>


              <td>{{ $cot["raison_sociale"] }} </td>
              <td>{{ $cot["total_brut"] }}</td>
              <td>{{ $cot["total_cotise"] }}</td>
              <td></td>
              <td></td>
              <td> <a href="{{ route('cotisation-par-employeur',['raison_sociale'=>$cot["raison_sociale"],'employer_id'=>$employer[0]['id'] ]) }}"    class="btn btn-danger rounded-pill"> Details</a>
                <a href="http://" class="btn btn-danger rounded-pill"> Releve</a>
                </td>


            </tr>

            @endforeach

        </tbody>
    </table>
   </div> --}}



</section>


@endsection
