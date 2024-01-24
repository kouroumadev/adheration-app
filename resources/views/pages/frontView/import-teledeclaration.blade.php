@extends('pages.frontView.master')
@section('content-front')
    <section class="section dashboard">

        <div class="row">

                <div class="col-sm-10">

                    <div class="card">
                        <div class="card-header mb-3">
                            Téléchargement du fichier de cotisation
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="card text-white bg-success">
                                        <div class="card-body">
                                          <h5 class="card-title text-white">Important !</h5>
                                          <p class="card-text">
                                            Avant d'inserer la liste des cotisations, veuillez telecharger le fichier échantillon ci-dessous pour être en conformité
                                            avec les règles du fichier des cotisations.
                                          </p>
                                          <button type="button" class="btn btn-primary">
                                            <a
                                                href="{{ asset('asset/cotisation.xlsx') }}" target="_blank"
                                            style="color:#fff;">Telecharger le fichier échantillon</a>

                                        </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <form method="post" action="{{ route('import-cotisation') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-sm-12 mb-3">
                                            <input type="file" class="form-control" name="cotisation_file" type="file" id="cotisation_file" required>
                                        </div>

                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success">Enregister</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <form method="get" action="{{ route('import-get-employees') }}">
                                @csrf
                                @if ($entreprise->categorie == "E+20")
                                    <div class="row justify-content-center">

                                        <div class="col-md-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Mois</label>
                                            <div class="">
                                                <select class="form-select" name="months_id" required>
                                                    @foreach ($mois as $m)
                                                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Annee</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-success">Afficher</button>
                                        </div>

                                    </div>
                                @else
                                    <div class="row justify-content-center align-items-center">

                                        <div class="col-md-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Trimestre</label>
                                            <div class="">
                                                <select class="form-select" name="commune_employer">
                                                    @foreach ($trimestres as $trimestre)
                                                    <option value="{{ $trimestre->id }}">{{ $trimestre->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Annee</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-success">Afficher</button>
                                        </div>

                                    </div>
                                @endif
                            </form>

                            </div>

                                {{-- <div class="col-md-3">
                                    <button class="btn btn-success">valider</button>
                                </div> --}}



                        </div>


                    </div>

                </div>

        </div>

        <div class="row m-auto">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <table class="table datatable">
                            {{-- <div class="row mb-2" style="width: 200px;">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployer"> <i
                                        class="bi bi-save"></i> Ajout Employer</button>
                            </div> --}}
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Salaire Brut</th>
                                    <th scope="col">Salaire Soumis A cotisation</th>
                                    <th scope="col">Montant cotise</th>
                                    <th scope="col">Mois</th>
                                    <th scope="col">Annee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cotisations as $dem )
                                <tr>

                                    <td>{{ $dem['employers']['nom_employer'] }}</td>
                                    <td>{{ $dem['employers']['prenom_employer']}}</td>
                                    <td>{{ $dem['salaire_brute']}} </td>
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
                                {{-- {{ route('liberer-employer', $dem['id']) }} --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> --}}


    <script>
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
@endsection
