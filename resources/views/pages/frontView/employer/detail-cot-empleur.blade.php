@extends('pages.frontView.master')
@section('content-front')

<section class="section Profile">


    <div class="row mb-3 m-auto">
        <div class="col-xl-6 w-100">

            <div class="card w-100">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{ asset('images/person_3.jpg') }}"  width="150" height="150" alt="Profile" class="rounded-circle">
                <div class="row w-50">
                    <div class="col-lg-6 col-md-6 label ">Nom Complet</div>
                    <div class="col-lg-6 col-md-6">{{ $cotisation[0]['employers']['prenom_employer'] }} {{ $cotisation[0]['employers']['nom']}}</div>
                  </div>

                  <div class="row w-50">
                    <div class="col-lg-6 col-md-6 label">Matricule</div>
                    <div class="col-lg-6 col-md-6">{{ $cotisation[0]['employers']['matricule']  }}</div>
                  </div>

                  <div class="row w-50">
                    <div class="col-lg-6 col-md-6 label">Numero Immatriculation</div>
                    <div class="col-lg-6 col-md-6">{{ $cotisation[0]['employers']['n_immatriculation']  }}</div>
                  </div>

                  <div class="row w-50">
                    <div class="col-lg-6 col-md-6 label">Employeur</div>
                    <div class="col-lg-6 col-md-6">{{ $cotisation[0]['entreprises']['raison_sociale']  }}</div>
                  </div>

              </div>
            </div>

          </div>

    </div>

    <table class="table datatable">

        <thead>
          <tr>


            <th scope="col">Total Brut</th>
            <th scope="col">Total Cotise</th>
            <th scope="col">Periode</th>
            <th scope="col">Mois</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($cotisation as $cot )


          <tr>



              <td>{{ $cot["salaire_brut"] }}</td>
              <td>{{ $cot["montant_cotise"] }}</td>
              <td></td>
              <td></td>



            </tr>

            @endforeach

        </tbody>
      </table>
    </div>


</section>
@endsection
