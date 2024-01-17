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
                                            Avant d'inserer la liste des cotisations, veuillez telecharger le fichier teste ci-dessous pour etre en conformiter
                                            avec les regles du fichier des cotisations.
                                          </p>
                                          <button type="button" class="btn btn-primary">
                                            <a
                                                href='/asset/employee_list.xlsx' target="_blank"
                                            style="color:#fff;">Telecharger le fichier teste</a>

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
                                            <button type="submit" class="btn btn-primary">Enregister</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


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
                                    <th scope="col">Periode Debut</th>
                                    <th scope="col">Periode Fin</th>
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
                                    <td>{{ $dem['periode_debut']}}</td>
                                    <td>{{ $dem['periode_fin']}} </td>

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
@endsection
